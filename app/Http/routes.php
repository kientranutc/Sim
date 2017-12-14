<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * process login-logout
 */
Route::get('login', [
        'as' => 'login',
        'uses' => 'Backend\AuthController@index'
]);
Route::post('login', [
        'as' => 'login',
        'uses' => 'Backend\AuthController@processLogin'
]);
Route::get('logout', [
        'as' => 'logout',
        'uses' => 'Backend\AuthController@logout'
]);