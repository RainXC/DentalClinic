<?php

// ===== Gallery
Route::get('gallery', [
	'as' => 'gallery.all',
	'uses' => 'GalleryController@showAll'
]);

Route::get('gallery/galleryJson', [
	'as' => 'gallery.json',
	'uses' => 'GalleryController@showJson'
]);

Route::group(['before' => 'auth'], function ()
{
	Route::get('content/{id}/edit/', ['uses' => 'GalleryController@edit', 'as' => 'Gallery.edit']);
	Route::get('gallery/create', [
		'as' => 'gallery.create',
		'uses' => 'GalleryController@create'
	]);
	Route::post('gallery/store', [
		'as' => 'gallery.store',
		'uses' => 'GalleryController@store'
	]);
});

Route::get('gallery/{slug}', [
	'as' => 'gallery.show',
	'uses' => 'GalleryController@show'
]);
