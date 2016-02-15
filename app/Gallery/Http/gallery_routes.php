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

Route::group(['middleware' => 'adminAccess'], function ()
{
	Route::put('admin/gallery/uploadImage', [
		'as' => 'gallery.uploadImage',
		'uses' => 'GalleryAdminController@uploadImage'
	]);

	Route::resource('admin/gallery', 'GalleryAdminController');

});

Route::get('gallery/{slug}', [
	'as' => 'gallery.show',
	'uses' => 'GalleryController@show'
]);
