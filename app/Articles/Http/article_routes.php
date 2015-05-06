<?php

// ===== Articles
Route::get('articles', [
	'as' => 'articles.all',
	'uses' => 'ArticlesController@showAll'
]);

Route::group(['before' => 'auth'], function ()
{
	Route::get('content/{id}/edit/', ['uses' => 'ArticleController@edit', 'as' => 'articles.edit']);
	Route::get('articles/create', [
		'as' => 'articles.create',
		'uses' => 'ArticlesController@create'
	]);
	Route::post('articles/store', [
		'as' => 'articles.store',
		'uses' => 'ArticlesController@store'
	]);
});

Route::get('articles/{slug}', [
	'as' => 'articles.show',
	'uses' => 'ArticlesController@show'
]);
