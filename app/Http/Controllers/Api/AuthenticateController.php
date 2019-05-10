<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\plugin\user\User;
use App\Mail\User\{
    ForgetPassword,
    EmailVerification
};
use App\plugin\user\Repositories\UserRepository;
use Mail;
use App\plugin\user\Requests\{
    SignupRequest,
    LoginRequest,
    ForgetPasswordRequest,
    RecoverPasswordRequest,
    ChangePasswordRequest
};

use \Carbon\Carbon;

class AuthenticateController extends Controller
{
    protected $repo;
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
        //$this->middleware('jwt.auth', ['except' => ['login','signUp','forgetPassword','getDetails','emailVerify','emailPrefer']]);
    }

    /**
    * Create a new User and send email for verify email.
    *
    * @return json
    */
    public function signUp(Request $request){
        if($error = $this->repo->apiSignUp($request)){
            return response()->json($error['response'], $error['http_status']);
        }else{
            if ($user = $this->repo->createUser($request)){
                $this->repo->sendSignupMail($request->input('email'));
             return ;
            }else{
                abort(500);
            }    
        }
    }

    /**
    * resend email for verify email.
    *
    * @return json
    */
    public function emailVerify($id){
        $email = $this->repo->getUserFromId($id)->email;
        if ($this->repo->sendSignupMail($email)){
            $response['message'] = "Email verification mail send to you email succesfully";
            $http_status = 200;
        }else{
            $response['message'] = "Something went wrong";
            $http_status = 500;
        }
        return response()->json($response, $http_status);
    }

    /**
    * rgenerate token for already login user.
    *
    * @return json
    */
    public function regenerateToken($id){
        $user = $this->repo->getUserFromId($id);
        if ($token = Auth::guard('api')->fromUser($user)){
            $response['message'] = "Token generated successfully";
            $response['token'] = $token;
            $http_status = 200;
        }else{
            $response['message'] = "Something went wrong";
            $http_status = 500;
        }
        return response()->json($response, $http_status);
    }

    /**
    * login user and return jwt auth token.
    * 
    * @return json
    */
    public function login(Request $request){
        $error = $this->repo->apiSignIn($request);
        if($error){
            return response()->json($error['response'], $error['http_status']);    
        }else{
            return ;
        }
        
    }

    /**
    * Send forgot password email to user email.
    *
    * @return json
    */
    public function forgetPassword(Request $request){
        $resp = $this->repo->apiForgetPassword($request);
        if($resp){
            return response()->json($resp['response'], $resp['http_status']);
        }else{
            $id = $this->repo->getUserFromEmail($request->input('email'))['id'];
            $otp = $this->repo->generateOtp(30,$id);
            if($otp){
                $this->repo->sendForgetPasswordMail($request,$otp);
                return ;
            }else{
                $response['message'] = "Something went wrong";
                $http_status = 500;
                return response()->json($response,$http_status);
            }              
        }
        
        
    }

    /**
    * get detail of login user with jwt auth token.
    *
    * @return json
    */
    public function getDetails($id){
        if($user = $this->repo->getUserFromId($id)){
            $response['data']['type'] = 'users';
            $response['data']['id'] = $id;
            $attr["email"] = $user->email;
            $attr["email_validated"] = $user->email_verified_at?true:false;
            $attr["first_name"] = $user->first_name;
            $attr["last_name"] = $user->last_name;
            $attr["scopes"] = null;
            $attr["stripe_customer_id"] = "";
            $attr["stripe_account_id"] = "";
            $response["data"]["attributes"] = $attr;
            $response["data"]["relationships"]["email_preferences"]["data"]["type"] = "email_preferences";
            $response["data"]["relationships"]["email_preferences"]["data"]["id"] = $id;
            $inc["type"] = "email_preferences";
            $inc["id"] = $id;
            $inc["attributes"]["promotions"] = $user->is_promo?true:false;
            $inc["attributes"]["updates"] = $user->is_product_update?true:false;
            $response['included'][0] = $inc;

            $http_status = 200;
        }
        else{
            $response['user'] = [];
            $http_status = 500;
        }
        return response()->json($response,$http_status);
    }

    /**
    * put email preferences.
    *
    * @return json
    */
    public function emailPrefer(Request $request,$id){
        if($this->repo->updateUserPreference($id, $request->input('data')['attributes']['promotions'], $request->input('data')['attributes']['updates'])){
            if($user = $this->repo->getUserFromId($id)){
                $response['data']['type'] = 'users';
                $response['data']['id'] = $id;
                $attr["promotions"] = $user->is_promo?true:false;
                $attr["updates"] = $user->is_product_update?true:false;
                $response["data"]["attributes"] = $attr;
                $http_status = 200;    
            }else{
                $response['errors'] = [];
                $http_status = 500;    
            }
            
        }
        else{
            $response['errors'] = [];
            $http_status = 500;
        }
        return response()->json($response,$http_status);
    }


    /**
    * change password with old password by user.
    *
    * @return json
    */
    public function changePassword(ChangePasswordRequest $request){
        if(\Hash::check($request->input('old_password'), Auth::guard('api')->user()->password)){
            if($this->repo->updatePassword($request,Auth::guard('api')->user()->id)){
                $response['message'] = "Password changed successfully";
                $http_status = 200;
            }else{
                $response['message'] = "Something went wrong";
                $http_status = 500;
            }
        }
        else{
            $response['message'] = "Your password does not matched with our record.";
            $http_status = 422;
        }
        return response()->json($response,$http_status);
    }
}
