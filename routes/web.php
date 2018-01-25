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

Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.'], function(){

    Route::get('/','Account\AccountController@index')->name('index');

    Route::get('profile','Account\ProfileController@index')->name('profile.index');

    Route::patch('profile', 'Account\ProfileController@store')->name('profile.store');

    Route::get('password','Account\ChangePasswordController@index')->name('change.password.index');

    Route::patch('password', 'Account\ChangePasswordController@update')->name('change.password.update');
});

Route::group(['prefix' => 'activation', 'as' => 'activation.', 'middleware' => ['guest']], function(){

    Route::get('/resend', 'Auth\ActivationResendController@index')->name('resend');

    Route::post('/resend', 'Auth\ActivationResendController@store')->name('resend.store');

    Route::get('/{confirmation_token}', 'Auth\ActivationController@activate')->name('activate');  
});



