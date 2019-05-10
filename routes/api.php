<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'v1','namespace' => 'Api'], function(){
    Route::post('/register','AuthenticateController@signUp');
    Route::put('/email-preferences/{id}','AuthenticateController@emailPrefer');
    Route::get('/send_email/validate_account/{id}','AuthenticateController@emailVerify');
    Route::get('/regenerate/token/{id}','AuthenticateController@regenerateToken');
    Route::post('/login','AuthenticateController@login');
    Route::post('send_email/reset_password','AuthenticateController@forgetPassword');
    Route::get('/user/details/{id}','AuthenticateController@getDetails');
    Route::put('/user/update','AuthenticateController@updateUser');
    Route::put('/user/change/password','AuthenticateController@changePassword');
});
