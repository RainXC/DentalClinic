<?php

// ===== Services
Route::get('services', [
	'as' => 'services.all',
	'uses' => 'ServicesController@showAll'
]);

Route::group(['before' => 'auth'], function ()
{
	Route::get('content/{id}/edit/', ['uses' => 'ServicesController@edit', 'as' => 'services.edit']);
	Route::get('services/create', [
		'as' => 'services.create',
		'uses' => 'ServicesController@create'
	]);
	Route::post('services/store', [
		'as' => 'services.store',
		'uses' => 'ServicesController@store'
	]);
});

Route::get('services/{slug}', [
	'as' => 'services.show',
	'uses' => 'ServicesController@show'
]);
