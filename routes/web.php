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
    return view('welcome');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'web'], function(){
	Route::get('test',[
		'as' 	=> 'test',
		'uses'	=> function(){
			return view('hhome');
		},
	]);
});
Route::group(['middleware' => 'auth'], function(){
	//
});
Route::group(['middleware' => ['auth','verified']], function(){
	Route::resource('users', 'UserController');
	Route::resource('roles', 'RoleController');
	Route::resource('messages', 'MessageController');

	Route::get('messages-{type}',[
		'as'	=> 'message.index',
		'uses'	=> 'MessageController@index',
	]);

	Route::get('message-{type}-{id}',[
		'as'	=> 'message.show',
		'uses'	=> 'MessageController@show',
	]);

	Route::get('message-create',[
		'as'	=> 'message.create',
		'uses'	=> 'MessageController@create',
	]);

	Route::get('admin-dashboard',[
		'as'	=> 'admin',
		'uses'	=> 'AdminPageController@index',
	]);

	Route::get('profile', [
		'as'	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
});
