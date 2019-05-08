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
			return view('rhome');
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
	Route::resource('companies', 'CompanyController');
	Route::resource('registrations', 'CoRegistrationController');
	Route::resource('boards', 'BoardController');
	Route::resource('departments', 'DepartmentController');
	Route::resource('reservations', 'NameReservationController');
	Route::resource('nominals', 'NominalController');
	Route::resource('notices', 'NoticeActController');
	Route::resource('prices', 'PriceController');
	Route::resource('receipts', 'ReceiptController');
	Route::resource('transactions', 'TransactionController');

	/*	custom messages	*/
	Route::get('home-messages-{type}',[
		'as'	=> 'message.index',
		'uses'	=> 'MessageController@index',
	]);

	Route::get('home-message-{type}-{id}',[
		'as'	=> 'message.show',
		'uses'	=> 'MessageController@show',
	]);

	Route::get('home-message-create',[
		'as'	=> 'message.create',
		'uses'	=> 'MessageController@create',
	]);
	/*	/end of messages	*/
	/*	custom companies	*/

	/*	/end of companies	*/
	/*	custom registrations	*/

	/*	/end of registrations	*/
	/*	custom registrations	*/

	/*	/end of registrations	*/
	/*	custom boards	*/

	/*	/end of boards	*/
	/*	custom departments	*/

	/*	/end of departments	*/
	/*	custom reservations	*/

	/*	/end of reservations	*/
	/*	custom nominals	*/

	/*	/end of nominals	*/
	/*	custom notices	*/

	/*	/end of notices	*/
	/*	custom prices	*/

	/*	/end of prices	*/
	/*	custom receipts	*/

	/*	/end of receipts	*/
	/*	custom transactions	*/

	/*	/end of transactions	*/

	Route::get('admin-dashboard',[
		'as'	=> 'admin',
		'uses'	=> 'AdminPageController@index',
	]);

	Route::get('profile', [
		'as'	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
});
