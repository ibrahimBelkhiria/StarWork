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
//user profile
Route::get('profile','HomeController@profile')->name('user_profile');
Route::post('profile','HomeController@update_avatar');
   // client profile
Route::get('/client/profile','ClientController@profile')->name('client_profile');
Route::post('/client/profile','ClientController@update_avatar');

    // authentification for the client
Route::get('/client/login','Auth\ClientLoginController@showLoginForm')->name('client.login');
Route::post('/client/login','Auth\ClientLoginController@login')->name('client.login.submit');
Route::get('/client', 'ClientController@index')->name('client.dashboard');


Route::get('/client/register','Auth\ClientRegisterController@showRegistrationForm')->name('client.register');
Route::post('/client/register','Auth\ClientRegisterController@register')->name('client.register.submit');

   // crud for the startup
Route::resource('/startups','StartupController');
   // crud for the projects

Route::get('client/project/create','ProjectController@create')->name('client.project.create');
Route::post('client/project/create','ProjectController@store');
Route::get('client/project','ProjectController@index')->name('projects');
Route::get('client/project/{project}','ProjectController@show')->name('client.project');
Route::get('client/project/{project}/edit','ProjectController@edit')->name('client.project.edit');
Route::post('client/project/{project}/edit','ProjectController@update')->name('client.project.update');
Route::delete('client/project/{project}/delete','ProjectController@destroy')->name('client.project.delete');



   // password ressets routes for client
Route::post('/client/password/email','Auth\ClientForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
Route::get('/client/password/reset','Auth\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.request');
Route::post('/client/password/reset','Auth\ClientResetPasswordController@reset');
Route::get('/client/password/reset/{token}','Auth\ClientResetPasswordController@showResetForm')->name('client.password.reset');


  // routes for contact the startup emails
Route::get('/startup/contact/{startup}','ContactController@show')->name('contact.startup');
Route::post('/startup/contact/{startup}','ContactController@store')->name('contact.startup');

  // routes for the project application
Route::get('/project/application/{project}','ApplicationController@show');
Route::post('/project/application/{project}','ApplicationController@store');


   //routes for startup_projects crud
Route::resource('/startup/project','StartupProjectController');

   //routes for tasks crud
Route::get('/project/task','TaskController@index')->name('task.list');
Route::get('/project/{project}/task/create','TaskController@create');
Route::post('/project/{project}/task','TaskController@store');
Route::get('/project/task/{task}','TaskController@edit');
Route::put('/project/task/{task}','TaskController@update');
Route::delete('/project/task/{task}','TaskController@destroy');

  //routes for employees

Route::resource('/startup/employee','EmployeeController');
