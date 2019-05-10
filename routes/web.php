<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//start landing page routes
Route::get('/', 'LandingController@index')->name('index');
Route::get('/about', 'LandingController@getAbout')->name('about');
Route::get('/support', 'LandingController@getSupport')->name('support');
Route::get('/services', 'LandingController@getService')->name('services');
Route::get('/faq', 'LandingController@getFaq')->name('faq');
Route::get('/blog', 'LandingController@getblog')->name('blog');
Route::post('/query/submit', 'LandingController@postQuery')->name('query.submit');
//end login page routes
Route::get('/user/change/password/{id}','Api\UserController@getRecoverPassword');
Route::get('user/verify/email/{id}','Api\UserController@verifyEmail');
Route::get('change/password','Api\UserController@changePassword')->name('user.change.password');
Route::get('user/login/{id}','Api\UserController@loginUser')->name('login.user');
//   route group middleware guest starts
Route::group(['namespace' => 'Auth','middleware' => ['guest']], function ()
{

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::get('forget', 'ForgotPasswordController@showLinkRequestForm')->name('get-forget');
    Route::post('forget', 'ForgotPasswordController@sendResetLinkEmail')->name('post-forget');
    Route::get('signup', 'RegisterController@showRegistrationForm')->name('get-signup');
    Route::post('signup', 'RegisterController@register')->name('admin.signup');
    Route::post('/login', 'LoginController@login')->name('admin.login');
});

//   route group middleware guest ends

// routes accessed by admin only
Route::group([ 'prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['admin']], function ()
{
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('users', 'UserController@index')->name('user.listing');
    Route::get('query', 'QueryController@index')->name('query.listing');
});

// routes accessed by users only
Route::group([ 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['user']], function ()
{
    Route::get('profile', 'ProfileController@index')->name('user.profile');
    Route::put('update/profile', 'ProfileController@updateProfile')->name('user.profile.update');
    Route::put('update/password', 'ProfileController@changePassword')->name('user.password.update');
    Route::get('/resend/verify/email','ProfileController@emailVerify')->name('verify.email');
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');