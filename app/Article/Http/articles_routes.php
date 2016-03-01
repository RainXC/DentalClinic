<?php

// ===== Article
Route::get('articles', [
	'as' => 'articles.all',
	'uses' => 'ArticleController@showAll'
]);

Route::get('read/{slug}', [
	'as' => 'articles.read',
	'uses' => 'ArticleController@read'
]);

Route::get('articles/articlesJson', [
	'as' => 'articles.json',
	'uses' => 'ArticleController@showJson'
]);

Route::group(['middleware' => 'adminAccess'], function ()
{
	Route::put('admin/articles/uploadImage', [
		'as' => 'articles.uploadImage',
		'uses' => 'ArticleAdminController@uploadImage'
	]);

	Route::put('admin/articles/setImagesPriority', [
		'as' => 'articles.setImagesPriority',
		'uses' => 'ArticleAdminController@setImagesPriority'
	]);
	Route::delete('admin/articles/deleteImage/{slug}', [
		'as' => 'articles.deleteImage',
		'uses' => 'ArticleAdminController@deleteImage'
	]);

	Route::resource('admin/articles', 'ArticleAdminController');

});

Route::get('articles/{slug}', [
	'as' => 'articles.show',
	'uses' => 'ArticleController@show'
]);
