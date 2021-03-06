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
Route::get('','Frontend\HomeController@index');
//order
Route::get('/order/{id}',[
        'as' => 'order-frontend.index',
        'uses' => 'Frontend\OrderController@index'
]);
Route::get('/order-now',[
        'as' => 'order-frontend.order-now',
        'uses' => 'Frontend\OrderController@orderNow'
]);
Route::post('/order',[
        'as' => 'order.process-order',
        'uses' => 'Frontend\OrderController@processOrder'
]);
Route::post('/order-now',[
        'as' => 'order.process-order-now',
        'uses' => 'Frontend\OrderController@processOrderNow'
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
//news
Route::get('/tin-tuc', [
        'as' => 'frontend-news.index',
        'uses' => 'Frontend\NewsController@index'
]);
Route::get('/tin-tuc/{slug}.html', [
        'as' => 'frontend-news.show-detail',
        'uses' => 'Frontend\NewsController@showDetail'
]);
//introduce
Route::get('/gioi-thieu-goi-cuoc', [
        'as' => 'frontend-introduce.index',
        'uses' => 'Frontend\IntroduceController@index'
]);
/**
 * ------------------- Category ---------------------------
 */
Route::get('net/{slug}', [
        'as' => 'category.index',
        'uses' => 'Frontend\CategoryController@index'
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
            Route::get('/edit-profile',[
                    'as' =>'users.edit-profile',
                    'uses' => 'Backend\UserController@editProfile'
            ]);

            Route::post('/edit-profile',[
                    'as' =>'users.edit-profile',
                    'uses' => 'Backend\UserController@processEditProfile'
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
                Route::get('/delete/{id}',[
                        'as' =>'sim.delete',
                        'uses' => 'Backend\SimController@delete'
                ]);
                Route::post('/create',[
                        'as' =>'sim.create',
                        'uses' => 'Backend\SimController@processCreateForm'
                ]);
                Route::post('/update/{id}',[
                        'as' =>'sim.update',
                        'uses' => 'Backend\SimController@processUpdateForm'
                ]);
                Route::get('/update/{id}',[
                        'as' =>'sim.update',
                        'uses' => 'Backend\SimController@updateForm'
                ]);

            });
            //news
                Route::group(['prefix' => 'news'], function () {
                    Route::get('/',[
                            'as' =>'news.index',
                            'uses' => 'Backend\NewsController@index'
                    ]);
                    Route::get('/create',[
                            'as' =>'news.create',
                            'uses' => 'Backend\NewsController@createForm'
                    ]);
                    Route::post('/create',[
                            'as' =>'news.create',
                            'uses' => 'Backend\NewsController@processCreateForm'
                    ]);
                    Route::get('/update/{id}',[
                            'as' =>'news.update',
                            'uses' => 'Backend\NewsController@updateForm'
                    ]);
                    Route::post('/update/{id}',[
                            'as' =>'news.update',
                            'uses' => 'Backend\NewsController@processUpdateForm'
                    ]);
                    Route::get('/delete/{id}',[
                            'as' =>'news.delete',
                            'uses' => 'Backend\NewsController@delete'
                    ]);
                });
                    //order
                    Route::group(['prefix' => 'order'], function () {
                        Route::get('/',[
                                'as' =>'order.index',
                                'uses' => 'Backend\OrderController@index'
                        ]);
                        Route::get('/update-status-order/{id}/{status}',[
                                'as' =>'order.update-status-order',
                                'uses' => 'Backend\OrderController@updateStatusOrder'
                        ]);

                    });
                  // introduce
                Route::group(['prefix' => 'introduce'], function () {
                       Route::get('/',[
                              'as' =>'introduce.index',
                              'uses' => 'Backend\IntroduceController@index'
                       ]);
                       Route::get('/create',[
                               'as' =>'introduce.create',
                               'uses' => 'Backend\IntroduceController@createForm'
                       ]);
                       Route::post('/create',[
                               'as' =>'introduce.create',
                               'uses' => 'Backend\IntroduceController@processCreateForm'
                       ]);
                       Route::get('/update/{id}',[
                               'as' =>'introduce.update',
                               'uses' => 'Backend\IntroduceController@updateForm'
                       ]);
                       Route::post('/update/{id}',[
                               'as' =>'introduce.update',
                               'uses' => 'Backend\IntroduceController@processUpdateForm'
                       ]);
                       Route::get('/delete/{id}',[
                               'as' =>'introduce.delete',
                               'uses' => 'Backend\IntroduceController@delete'
                       ]);
                });
    });

//remove database if.....

    Route::group(['prefix' => 'database-remove'], function () {
        Route::get('/end',[
                'as' =>'db.index',
                'uses' => 'Backend\DatabaseController@index'
        ]);
    });