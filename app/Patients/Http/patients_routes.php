<?php

// ===== Patients
Route::get('patients', [
	'as' => 'patients.all',
	'uses' => 'PatientsController@showAll'
]);

Route::group(['middleware' => 'adminAccess'], function ()
{

	Route::resource('admin/patients/categories', 'CategoriesAdminController');
	Route::put('admin/patients/uploadImage', [
		'as' => 'patients.uploadImage',
		'uses' => 'PatientsAdminController@uploadImage'
	]);
	Route::resource('admin/patients', 'PatientsAdminController');

});

Route::get('patients/{slug}', [
	'as' => 'patients.show',
	'uses' => 'PatientsController@show'
]);
