<?php

Route::get('/', [
	'as' => 'landing.show',
	'uses' => 'LandingController@show'
]);

Route::get('/api/landing/employees', 'LandingController@employees');
Route::get('/api/landing/services', 'LandingController@services');
Route::get('/api/landing/gallery', 'LandingController@gallery');