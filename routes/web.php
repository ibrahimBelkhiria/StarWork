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

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/client/login','Auth\ClientLoginController@showLoginForm')->name('client.login');
Route::post('/client/login','Auth\ClientLoginController@login')->name('client.login.submit');
Route::get('/client', 'clientController@index')->name('client.dashboard');

Route::get('/client/register','Auth\ClientRegisterController@showRegistrationForm')->name('client.register');
Route::post('/client/register','Auth\ClientRegisterController@register')->name('client.register.submit');

Route::resource('/startups','StartupController');