<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\plugin\user\Requests\{
    ChangePasswordRequest,
    UpdateInfoRequest
};
use App\plugin\user\Repositories\UserRepository;

class ProfileController extends Controller
{

    protected $repo;
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
    * index page of user profile.
    *
    * @return json
    */
    public function index(){
        return view('user.profile.index');
    }
    
    /**
    * post request for update first name,last name,email and email preferences
    *
    * @return json
    */
    public function updateProfile(UpdateInfoRequest $request){
        $this->addPromoProductkey($request);
        if($this->repo->updateUser($request,Auth::user()->id)){
            $response['message'] = "Profile updated successfully";
            $response['name'] = $request->input('first_name').' '.$request->input('last_name');
            $http_status = 200;
        }else{
            $response['message'] = "Something went wrong";
            $http_status = 500;
        } 
        return response()->json($response,$http_status);
    }

    /**
    * change password with old password.
    *
    * @return json
    */    
    public function changePassword(ChangePasswordRequest $request){
        if(\Hash::check($request->input('old_password'), Auth::user()->password)){
            if($this->repo->updatePassword($request,Auth::user()->id)){
                $response['message'] = "Password changed successfully";
                $http_status = 200;
            }else{
                $response['message'] = "Something went wrong";
                $http_status = 500;
            }
        }
        else{
            $response['message'] = "Your password does not matched with our record.";
            $http_status = 500;
        }
        return response()->json($response,$http_status);
    }

    public function addPromoProductkey($request){
        if(!$request->has('is_promo')){
            $request->request->add(['is_promo'=> 0]);
        }
        if(!$request->has('is_product_update')){
            $request->request->add(['is_product_update' => 0]);
        }
    }

    /**
    * resend email for verify email.
    *
    * @return json
    */
    public function emailVerify(){
        $email = Auth::user()->email;
        if ($this->repo->sendSignupMail($email)){
            $response['message'] = "Email verification mail send to you email succesfully";
            $http_status = 200;
        }else{
            $response['message'] = "Something went wrong";
            $http_status = 500;
        }
        return response()->json($response, $http_status);
    }
}
