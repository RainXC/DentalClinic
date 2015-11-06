<?php

Route::get('employees', [
	'as' => 'employees.all',
	'uses' => 'EmployeesController@showAll'
]);

Route::get('employees/{slug}', [
	'as' => 'employees.show',
	'uses' => 'EmployeesController@show'
]);

Route::group(['middleware' => 'adminAccess'], function () {
	Route::resource('admin/employees', 'EmployeesAdminController');
//	Route::get('admin/employees', [
//		'as' => 'employees.all',
//		'uses' => 'EmployeesAdminController@showAll'
//	]);
//
//	Route::get('admin/employees/{slug}', [
//		'as' => 'employees.show',
//		'uses' => 'EmployeesAdminController@show'
//	]);
//
//	Route::get('admin/employees/{id}/edit/', [
//		'as' => 'employees.edit',
//		'uses' => 'EmployeesAdminController@edit',
//	]);
//
//	Route::get('admin/employees/create', [
//		'as' => 'employees.create',
//		'uses' => 'EmployeesAdminController@create'
//	]);
//
//	Route::post('admin/employees/store', [
//		'as' => 'employees.store',
//		'uses' => 'EmployeesAdminController@store'
//	]);
});
