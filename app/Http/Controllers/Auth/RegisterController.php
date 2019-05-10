<?php

namespace App\Http\Controllers\Auth;

use App\plugin\user\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\plugin\user\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use App\plugin\user\Requests\{
    SignupRequest
};
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $repo;
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(SignupRequest $request)
    {
        if($request->has('checkbox')){
            $request->request->add(['is_product_update' => 1]);
            $request->request->add(['is_promo' => 1]);
        }else{
            $request->request->add(['is_product_update' => 0]);
            $request->request->add(['is_promo' => 0]);
        }
        $request->request->add(['role' => 1]);
        $user = $this->repo->createUser($request);
        $this->repo->sendSignupMail($request->input('email'));
        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['bail','required', 'string', 'regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/', 'max:255', 'unique:users'],
            'first_name' => ['bail','required', 'string', 'max:255'],
            'last_name' => ['bail','required', 'string', 'max:255'],
            'password' => ['bail','required', 'string', 'min:4','max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create($data);
    }
}
