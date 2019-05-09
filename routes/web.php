<?php

/*
|--------------------------------------------------------------------------
| Web Routes for the URSB Lite System
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
	Route::resource('appointments', 'ActAppointmentController');
	Route::resource('registrations', 'CoRegistrationController');
	Route::resource('boards', 'BoardController');
	Route::resource('departments', 'DepartmentController');
	Route::resource('reservations', 'NameReservationController');
	Route::resource('nominals', 'NominalController');
	Route::resource('notices', 'NoticeActController');
	Route::resource('prices', 'PriceController');
	Route::resource('receipts', 'ReceiptController');
	Route::resource('transactions', 'TransactionController');

	/*	custom users	*/
		Route::get('admin-dashboard-users',[
			'as'	=> 'user.index',
			'uses'	=> 'UserController@index',
		]);
		Route::get('admin-dashboard-user-create',[
			'as'	=> 'user.create',
			'uses'	=> 'UserController@create',
		]);
		Route::get('admin-dashboard-users-{id}',[
			'as'	=> 'user.show',
			'uses'	=> 'UserController@show',
		]);
		Route::get('admin-dashboard-user-edit-{id}',[
			'as'	=> 'user.edit',
			'uses'	=> 'UserController@edit',
		]);
	/*	/end of users	*/
	/*	custom roles	*/
		Route::get('admin-user-roles',[
			'as'	=> 'role.index',
			'uses'	=> 'RoleController@index',
		]);
		Route::get('admin-user-role-create',[
			'as'	=> 'role.create',
			'uses'	=> 'RoleController@create',
		]);
		Route::get('admin-user-roles-{id}',[
			'as'	=> 'role.show',
			'uses'	=> 'RoleController@show',
		]);
		Route::get('admin-user-role-edit-{id}',[
			'as'	=> 'role.edit',
			'uses'	=> 'RoleController@edit',
		]);
	/*	/end of roles	*/
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
		Route::get('home-companies',[
			'as'	=>  'company.index',
			'uses'	=>	'CompanyController@index',
		]);
		Route::get('home-company-create',[
			'as'	=>  'company.create',
			'uses'	=>	'CompanyController@create',
		]);
		Route::get('home-companies-{id}',[
			'as'	=>	'company.show',
			'uses'	=>	'CompanyController@show',
		]);
		Route::get('home-company-edit-{id}',[
			'as'	=> 	'company.edit',
			'uses'	=>	'CompanyController@edit',
		]);
	/*	/end of companies	*/
	/*	custom appointments	*/
		Route::get('home-company-appointments',[
			'as'	=> 'appointment.index',
			'uses'	=>	'ActAppointmentController@index',
		]);
		Route::get('home-company-appointments-{id}',[
			'as'	=> 'appointment.show',
			'uses'	=>	'ActAppointmentController@show',
		]);
		Route::get('home-company-appointment-create',[
			'as'	=> 'appointment.create',
			'uses'	=>	'ActAppointmentController@create',
		]);
		Route::get('home-company-appointment-edit-{id}',[
			'as'	=> 'appointment.edit',
			'uses'	=>	'ActAppointmentController@edit',
		]);
	/*	/end of appointments	*/
	/*	custom registrations	*/
		Route::get('home-company-registrations',[
			'as'	=> 'reg.index',
			'users'	=> 'CoRegistrationController@index'
		]);
		Route::get('home-company-registration-create',[
			'as'	=> 'reg.create',
			'users'	=> 'CoRegistrationController@create'
		]);
		Route::get('home-company-registrations-{id}',[
			'as'	=> 'reg.show',
			'users'	=> 'CoRegistrationController@show'
		]);
		Route::get('home-company-registration-edit-{id}',[
			'as'	=> 'reg.edit',
			'users'	=> 'CoRegistrationController@edit'
		]);
	/*	/end of registrations	*/
	/*	custom boards	*/
		Route::get('admin-user-boards',[
			'as'	=> 	'board.index',
			'uses'	=>	'BoardController@index',
		]);
		Route::get('admin-user-board-create',[
			'as'	=> 	'board.create',
			'uses'	=>	'BoardController@create',
		]);
		Route::get('admin-user-boards-{id}',[
			'as'	=> 	'board.show',
			'uses'	=>	'BoardController@show',
		]);
		Route::get('admin-user-board-edit-{id}',[
			'as'	=> 	'board.edit',
			'uses'	=>	'BoardController@edit',
		]);
	/*	/end of boards	*/
	/*	custom departments	*/
		Route::get('admin-users-departments',[
			'as'	=> 'department.index',
			'uses'	=> 'DepartmentController@index',
		]);
		Route::get('admin-users-departments-{id}',[
			'as'	=> 'department.show',
			'uses'	=> 'DepartmentController@show',
		]);
		Route::get('admin-users-department-create',[
			'as'	=> 'department.create',
			'uses'	=> 'DepartmentController@create',
		]);
		Route::get('admin-users-department-edit-{id}',[
			'as'	=> 'department.edit',
			'uses'	=> 'DepartmentController@edit',
		]);
	/*	/end of departments	*/
	/*	custom reservations	*/
		Route::get('home-company-reservations',[
			'as'	=>	'reservation.index',
			'uses'	=>	'NameReservationController@index',
		]);
		Route::get('home-company-reservations-{id}',[
			'as'	=>	'reservation.show',
			'uses'	=>	'NameReservationController@show',
		]);
		Route::get('home-company-reservation-create',[
			'as'	=>	'reservation.create',
			'uses'	=>	'NameReservationController@create',
		]);
		Route::get('home-company-reservation-edit-{id}',[
			'as'	=>	'reservation.edit',
			'uses'	=>	'NameReservationController@edit',
		]);
	/*	/end of reservations	*/
	/*	custom nominals	*/
		Route::get('home-company-nominals',[
			'as'	=>	'nominal.index',
			'uses'	=>	'NominalController@index',
		]);
		Route::get('home-company-nominals-{id}',[
			'as'	=>	'nominal.show',
			'uses'	=>	'NominalController@show',
		]);
		Route::get('home-company-nominal-create',[
			'as'	=>	'nominal.create',
			'uses'	=>	'NominalController@create',
		]);
		Route::get('home-company-nominal-edit-{id}',[
			'as'	=>	'nominal.edit',
			'uses'	=>	'NominalController@edit',
		]);
	/*	/end of nominals	*/
	/*	custom notices	*/
		Route::get('home-company-acts-notices',[
			'as'	=> 'notice.index',
			'uses'	=> 'NoticeActController@index',
		]);
		Route::get('home-company-acts-notices-{id}',[
			'as'	=> 'notice.show',
			'uses'	=> 'NoticeActController@show',
		]);
		Route::get('home-company-acts-notice-create',[
			'as'	=> 'notice.create',
			'uses'	=> 'NoticeActController@create',
		]);
		Route::get('home-company-acts-notice-edit-{id}',[
			'as'	=> 'notice.edit',
			'uses'	=> 'NoticeActController@edit',
		]);
	/*	/end of notices	*/
	/*	custom prices	*/
		Route::get('home-company-registration-prices',[
			'as'	=> 'price.index',
			'uses'	=> 'PriceController@index',
		]);
		Route::get('home-company-registration-prices-{id}',[
			'as'	=> 'price.show',
			'uses'	=> 'PriceController@show',
		]);
		Route::get('home-company-registration-price-create',[
			'as'	=> 'price.create',
			'uses'	=> 'PriceController@create',
		]);
		Route::get('home-company-registration-price-edit-{id}',[
			'as'	=> 'price.edit',
			'uses'	=> 'PriceController@edit',
		]);
	/*	/end of prices	*/
	/*	custom receipts	*/
		Route::get('home-company-transactions-receipts',[
			'as'	=> 	'receipt.index',
			'uses'	=>	'ReceiptController@index',
		]);
		Route::get('home-company-transactions-receipts-{id}',[
			'as'	=> 	'receipt.show',
			'uses'	=>	'ReceiptController@show',
		]);
		Route::get('home-company-transactions-receipt-create',[
			'as'	=> 	'receipt.create',
			'uses'	=>	'ReceiptController@create',
		]);
		Route::get('home-company-transactions-receipt-edit-{id}',[
			'as'	=> 	'receipt.edit',
			'uses'	=>	'ReceiptController@edit',
		]);
	/*	/end of receipts	*/
	/*	custom transactions	*/
		Route::get('home-company-transactions',[
			'as'	=> 'transaction.index',
			'uses'	=> 'TransactionController@index',
		]);
		Route::get('home-company-transactions-{id}',[
			'as'	=> 'transaction.show',
			'uses'	=> 'TransactionController@show',
		]);
		Route::get('home-company-transaction-create',[
			'as'	=> 'transaction.create',
			'uses'	=> 'TransactionController@create',
		]);
		Route::get('home-company-transaction-edit-{id}',[
			'as'	=> 'transaction.edit',
			'uses'	=> 'TransactionController@edit',
		]);
	/*	/end of transactions	*/

	Route::get('admin-dashboard',[
		'as'	=> 'admin',
		'uses'	=> 'AdminPageController@index',
	]);

	Route::get('home-profile', [
		'as'	=> 'profile',
		'uses'	=> 'UserPageController@profile',
	]);
	Route::post('home-profile', [
		'as'	=> 'profile.update',
		'uses'	=> 'UserPageController@update_image'
	]);
	Route::post('home-profile-password', [
		'as'	=> 'password.update',
		'uses'	=> 'UserController@changePassword'
	]);
});
