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
 * frontend
 */
//home
Route::get('/','Frontend\HomeController@index');
//order
Route::get('/order',[
        'as' => 'order.index',
        'uses' => 'Frontend\OrderController@index'
]);
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


Route::group(['middleware' => 'AuthProtected','prefix' => 'admin'], function () {
        Route::get('logout', [
                'as' => 'logout',
                'uses' => 'Backend\AuthController@logout'
        ]);
        //user
        Route::group(['prefix' => 'users'], function () {
            Route::get('/',[
               'as' =>'users.index',
               'uses' => 'Backend\UserController@index'
            ]);
            Route::get('lock-unlock/{id}/{active}',[
                    'as' =>'users.lock-unlock',
                    'uses' => 'Backend\UserController@lockAndUnlockUser'
            ]);
            Route::get('/create',[
                    'as' =>'users.create',
                    'uses' => 'Backend\UserController@create'
            ]);
            Route::post('/create',[
                    'as' =>'users.createpost',
                    'uses' => 'Backend\UserController@processCreateUser'
            ]);
        });
    });
