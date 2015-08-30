<?php

// ===== Employees
Route::get('employees', [
	'as' => 'employees.all',
	'uses' => 'EmployeesController@showAll'
]);

Route::group(['before' => 'auth'], function ()
{
	Route::get('content/{id}/edit/', ['uses' => 'EmployeesController@edit', 'as' => 'employees.edit']);
	Route::get('employees/create', [
		'as' => 'employees.create',
		'uses' => 'EmployeesController@create'
	]);
	Route::post('employees/store', [
		'as' => 'employees.store',
		'uses' => 'EmployeesController@store'
	]);
});

Route::get('employees/{slug}', [
	'as' => 'employees.show',
	'uses' => 'EmployeesController@show'
]);
