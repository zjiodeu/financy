<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('main');
});

Route::get('users', function() {
    return "Users";
});

/*Payments main*/
Route::get('payment', 'PaymentController@show');
Route::get('payment/show', 'PaymentController@show');
Route::get('payment/addForm/{id?}', 'PaymentController@addForm');

Route::post('payment/add', 'PaymentController@add');
Route::put('payment/update/{id}', ['as' => 'payment.update', 'uses' => 'PaymentController@update']);
Route::get('payment/delete/{id}', 'PaymentController@delete');


/* Paytypes */

Route::get('paytype', 'PaytypeController@show');
Route::get('paytype/show', 'PaytypeController@show');
Route::get('paytype/addForm/{id?}', 'PaytypeController@addForm');

Route::post('paytype/add', 'PaytypeController@add');
Route::put('paytype/update/{id}', ['as' => 'paytype.update', 'uses' => 'PaytypeController@update']);
Route::get('paytype/delete/{id}', 'PaytypeController@delete');

/* Users */

Route::get('user', 'UserController@show');
Route::get('user/show', 'UserController@show');
Route::get('user/addForm/{id?}', 'UserController@addForm');
Route::get('user/logout', function() {
   Auth::logout();
   return Redirect::back();
});

Route::post('user/add', 'UserController@add');
Route::put('user/update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
Route::get('user/delete/{id}', 'UserController@delete');

Route::post('user/auth', function() {
    if (Auth::attempt([
    'username' => Input::get('username'), 
    'password' => Input::get('password')
        ])) {
        return Redirect::back()->with('success', 1);
    } 
    return Redirect::back()->with('success', 0);
});