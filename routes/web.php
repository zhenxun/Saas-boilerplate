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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.', 'namespace' => 'Account'], function(){

    Route::get('/','AccountController@index')->name('index');

    Route::get('profile','ProfileController@index')->name('profile.index');

    Route::patch('profile', 'ProfileController@store')->name('profile.store');

    Route::get('password','ChangePasswordController@index')->name('change.password.index');

    Route::patch('password', 'ChangePasswordController@update')->name('change.password.update');


    Route::group(['prefix' => 'subscription', 'namespace' => 'Subscription','as' => 'subscription.'], function(){

        Route::get('/cancel', 'SubscriptionCancelController@index')->name('cancel.index');
    });


});

Route::group(['prefix' => 'activation', 'as' => 'activation.', 'middleware' => ['guest']], function(){

    Route::get('/resend', 'Auth\ActivationResendController@index')->name('resend');

    Route::post('/resend', 'Auth\ActivationResendController@store')->name('resend.store');

    Route::get('/{confirmation_token}', 'Auth\ActivationController@activate')->name('activate');  
});

Route::group(['prefix' => 'plans', 'as' => 'subscription.'], function(){

    Route::get('/', 'Subscription\PlanController@index')->name('plans.index');

    Route::get('/teams', 'Subscription\PlanTeamController@index')->name('teams.index');

});

Route::group(['prefix' => 'subscription', 'as' => 'subscription.', 'middleware' => ['auth.register']], function(){

    Route::get('/', 'Subscription\SubscriptionController@index')->name('index');

    Route::post('/', 'Subscription\SubscriptionController@store')->name('store');

});




