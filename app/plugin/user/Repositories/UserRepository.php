<?php 
namespace App\plugin\user\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\{
	Otp
};
use App\plugin\user\User;
use Auth;
use Mail;
use App\plugin\user\Mail\{
    ForgetPassword,
    EmailVerification
};
use DataTables;
use Validator;
use \Carbon\Carbon;

class UserRepository
{
    // model property on class instances
    protected $model;

    // Constructor to bind model to repo
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function createUser($request){
        return $user = $this->model::create($request->only('email','first_name','last_name') + ['role' =>1, 'password' => bcrypt($request->input('password'))]);
    }

    public function apiSignIn($request){
        $user = User::whereEmail($request->input('email'));
        if(empty($request->input('email')) || empty($request->input('password')) ){
            $obj["title"] =  "email and/or password missing";
            $obj["detail"] =  "Email and password are required but were empty.";
            $obj["status"] = "400";
            $obj["code"] = "10120";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10120--email and/or password missing";
            $response['response']['errors'][0] = $obj;
            $response['http_status'] = 400;
        }else if(!$user->exists()){
            $obj["title"] =  "email address not found";
            $obj["detail"] =  "Email address ".$request->input('email')." was not found.";
            $obj["status"] = "404";
            $obj["code"] = "10050";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10050--email address not found";
            $response['response']['errors'][0] = $obj;
            $response['http_status'] = 404;
        }else if(!\Hash::check($request->input('password'), $user->first()->password)){
            $obj["title"] =  "incorrect password";
            $obj["status"] = "401";
            $obj["code"] = "10110";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10110--incorrect password";
            $response['response']['errors'][0] = $obj;   
            $response['http_status'] = 401;
        }else{
            $response = "";
        }
        return $response;
    }

    public function apiForgetPassword($request){
        $user = User::whereEmail($request->input('email'));
        if(empty($request->input('email')) ){
            $obj["title"] =  "email and/or password missing";
            $obj["detail"] =  "Email and password are required but were empty.";
            $obj["status"] = "400";
            $obj["code"] = "10120";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10120--email and/or password missing";
            $response['response']['errors'][0] = $obj;
            $response['http_status'] = 400;
        }else if(!$user->exists()){
            $obj["title"] =  "email address not found";
            $obj["detail"] =  "Email address ".$request->input('email')." was not found.";
            $obj["status"] = "404";
            $obj["code"] = "10050";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10050--email address not found";
            $response['response']['errors'][0] = $obj;
            $response['http_status'] = 404;
        }else{
            $response = "";
        }
        return $response;
    }

    public function apiSignUp($request){
        $user = User::whereEmail($request->input('email'));
        $response['response']['errors'] = [];
        if(empty($request->input('email'))){
            $obj["title"] =  "email and/or password missing";
            $obj["detail"] =  "Email is required but was empty.";
            $obj["status"] = "400";
            $obj["code"] = "10120";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10120--email and/or password missing";
            array_push($response['response']['errors'],$obj);
            $response['http_status'] = 400;
        }if(empty($request->input('password'))){
            $obj["title"] =  "email and/or password missing";
            $obj["detail"] =  "Password is required but was empty.";
            $obj["status"] = "400";
            $obj["code"] = "10120";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10120--email and/or password missing";
            array_push($response['response']['errors'],$obj);
            $response['http_status'] = 400;
        }
        else if(empty($request->input('email_confirmation')) || $request->input('email') != $request->input('email_confirmation')){
            $obj["title"] =  "email address not found";
            $obj["detail"] =  "Email ".$request->input('email')." and email confirmation ".$request->input('email_confirmation')." do not match.";
            $obj["status"] = "400";
            $obj["code"] = "10080";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10080--email addresses do not match";
            $response['response']['errors'][0] = $obj;
            $response['http_status'] = 400;
        }
        else if(!filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)){
            $obj["title"] =  "email addresses is malformed";
            $obj["status"] = "400";
            $obj["code"] = "10081";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10081--email addresses is malformed";
            $response['response']['errors'][0] = $obj;
            $response['http_status'] = 400;
        }
        else if(strlen($request->input('password')) < 6 || strlen($request->input('password') > 255) ){
            $obj["title"] =  "new password is malformed";
            $obj["detail"] = "password may only contain letters, numbers and/or the following symbols: ! @ # $ % ^ & * = + ( ) < > { } [  ] ; : , . / ?";
            $obj["status"] = "400";
            $obj["code"] = "10140";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10140--new password is malformed";
            $response['response']['errors'][0] = $obj;   
            $response['http_status'] = 400;
        }
        else if($user->exists()){
            $obj["title"] =  "email address already exists";
            $obj["detail"] = "Email address ".$request->input('email')." already exists.";
            $obj["status"] = "400";
            $obj["code"] = "10070";
            $obj["links"]["about"] = "https://github.com/ghostery/auth/wiki/Errors#10070--email address already exists";
            $response['response']['errors'][0] = $obj;   
            $response['http_status'] = 400;
        }else{
            $response = "";
        }
        return $response;
    }

    public function generateOtp($min,$id){
        $otp = $this->generateRandomString();
        $expires = Carbon::now()->addMinutes($min);
        $otps = Otp::updateOrCreate(['type'=>0,'user_id' => $id],['otp' => $otp, 'expires_on' => $expires]);
        return $otp;
    }

    public function generateRandomString(){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
    
    public function changePasswordValidator($request){
        return Validator::make($request->all(), [
            'password' => 'required|min:4|max:50|confirmed',
            'old_password' => 'required'
        ]);
    }

    public function sendSignupMail($email){
        $id = User::whereEmail($email)->first()->id;
        return Mail::to($email)->send(new EmailVerification($id));
    }
    
    public function generateToken($credentials){
        return Auth::guard('api')->attempt($credentials);
    }
    
    public function updatePassword($request,$id){
    	Otp::whereUserId($id)->whereType(0)->delete();
        return User::whereId($id)->update(['password' => bcrypt($request->input('password'))]);
    }

    public function getUserFromEmail($email){
        return User::whereEmail($email)->first();
    }

    public function getUserFromId($id){
        return User::whereId($id)->first();
    }

    public function verifyUserEmail($user){
        return $user->update(['email_verified_at' => Carbon::now()]);
    }

    public function getOtp($id){
        return Otp::whereOtp($id)->whereType(0)->where('expires_on', '>=' ,Carbon::now());
    }
    
    public function sendForgetPasswordMail($request,$otp){
        if(Mail::to($request->input('email'))->send(new ForgetPassword($otp))){
        	return true;
        }else{
        	return false;	
        }
        
    }

    public function updateUser($request, $id){
        return  User::whereId($id)->update($request->only('first_name', 'last_name', 'email', 'is_product_update', 'is_promo'));
    }
    public function updateUserPreference($id, $promo, $update){
        return  User::whereId($id)->update(['is_product_update' => $update, 'is_promo'=> $promo]);
    }

    public function userDataTable(){
        $data = User::whereRole(1)->latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('is_email',function($query){
                    if($query->email_verified_at){
                        $res = "Yes";
                    }else{
                        $res = "No";
                    }
                    return $res;
                })
                ->addColumn('is_product',function($query){
                    if($query->is_product_update){
                        $res = "Yes";
                    }else{
                        $res = "No";
                    }
                    return $res;
                })
                ->addColumn('is_promo',function($query){
                    if($query->is_promo){
                        $res = "Yes";
                    }else{
                        $res = "No";
                    }
                    return $res;
                })  
                ->addColumn('action', function($row){

                       $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    
}