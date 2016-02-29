<?php

// ===== Services
Route::get('services', [
	'as' => 'services.all',
	'uses' => 'ServicesController@showAll'
]);

Route::group(['middleware' => 'adminAccess'], function ()
{
	Route::resource('admin/services', 'ServicesAdminController');
});

Route::get('services/{slug}', [
	'as' => 'services.show',
	'uses' => 'ServicesController@show'
]);
