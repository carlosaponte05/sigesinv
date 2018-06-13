<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//REGISTER USER
Route::get('user/register','User\RegisterController@index');
Route::post('user/register','User\RegisterController@store');
//RECUPERAR CLAVE
Route::get('user/confirm_email','User\RegisterController@confirm_email');
Route::post('user/forgot','User\RegisterController@forgot_password');
Route::post('user/confirmar','User\RegisterController@confirmar');
//DOOR OF THE ADMIN PANEL
Route::get('admin/login', 'Admin\LoginController@getLogin');
Route::post('admin/login', 'Admin\LoginController@postLogin');
Route::get('admin/logout', 'Admin\LoginController@logout');
Route::get('admin/index','Admin\LoginController@index');

//ALL ABOUT ROLE.
Route::resource('admin/role','Admin\RoleController', ['except' => ['show', 'create']]);
Route::get('admin/role/create',['as' => 'admin.role.create', 
										  'uses' => 'Admin\RoleController@create']);
Route::get('admin/role/{id}/show',['as' => 'admin.role.show', 
										  'uses' => 'Admin\RoleController@show']);

//U CAN'T CONTROL IT ALONE.
/*Route::get('admin/user/{id}/delete',['as' => 'admin.user.delete',
											'uses' => 'Admin\UserController@delete']);
*/
Route::resource('admin/user', 'Admin\UserController',['except' => ['show', 'create']]);
Route::get('admin/user/create',['as' => 'admin.user.create', 
										  'uses' => 'Admin\UserController@create']);
Route::get('admin/user/{id}/show',['as' => 'admin.user.show', 
										  'uses' => 'Admin\UserController@show']);
Route::get('admin/user/{id}/profile',['as' => 'admin.user.profile', 
										  'uses' => 'Admin\UserController@profile']);
//ADMIN PANEL SETTINGS
Route::get('admin/setting', 'Admin\SettingController@index');
Route::post('admin/setting/save', 'Admin\SettingController@save');


Route::get('admin/binnacle','Admin\BinnacleController@index');