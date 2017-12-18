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

       //net
            Route::group(['prefix' => 'net'], function () {
                Route::get('/',[
                        'as' =>'net.index',
                        'uses' => 'Backend\NetController@index'
                ]);
                Route::get('/create',[
                        'as' =>'net.create',
                        'uses' => 'Backend\NetController@createForm'
                ]);
                Route::post('/create',[
                        'as' =>'net.create',
                        'uses' => 'Backend\NetController@processCreateForm'
                ]);
                Route::get('/edit/{id}',[
                        'as' =>'net.edit',
                        'uses' => 'Backend\NetController@editForm'
                ]);
                Route::post('/edit/{id}',[
                        'as' =>'net.edit',
                        'uses' => 'Backend\NetController@processEditForm'
                ]);
                Route::get('/delete/{id}',[
                        'as' =>'net.delete',
                        'uses' => 'Backend\NetController@delete'
                ]);
            });
       //type
        Route::group(['prefix' => 'type-sim'], function () {
               Route::get('/',[
                            'as' =>'type-sim.index',
                            'uses' => 'Backend\TypeSimController@index'
             ]);
               Route::get('/create',[
                       'as' =>'type-sim.create',
                       'uses' => 'Backend\TypeSimController@Create'
               ]);
               Route::post('/create',[
                       'as' =>'type-sim.create',
                       'uses' => 'Backend\TypeSimController@processCreateForm'
               ]);
               Route::get('/update/{id}',[
                       'as' =>'type-sim.update',
                       'uses' => 'Backend\TypeSimController@editForm'
               ]);
               Route::post('/update/{id}',[
                       'as' =>'type-sim.update',
                       'uses' => 'Backend\TypeSimController@processEditForm'
               ]);
               Route::get('/delete/{id}',[
                       'as' =>'type-sim.delete',
                       'uses' => 'Backend\TypeSimController@delete'
               ]);
        });
            //sim
            Route::group(['prefix' => 'sim'], function () {
                Route::get('/',[
                        'as' =>'sim.index',
                        'uses' => 'Backend\SimController@index'
                ]);
                Route::get('/create',[
                        'as' =>'sim.create',
                        'uses' => 'Backend\SimController@createForm'
                ]);
                Route::post('/create',[
                        'as' =>'sim.create',
                        'uses' => 'Backend\SimController@processCreateForm'
                ]);

            });
    });
