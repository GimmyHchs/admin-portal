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

Route::get('/', 'HomeController@index')->name('home');
Route::group(['namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@loginView')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LogoutController@logout')->name('logout');
    Route::post('register', 'RegisterController@register')->name('register');
});
