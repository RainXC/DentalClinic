<?php namespace LaravelRU\Articles;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Tests\Controller;

class ArticleServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		// Including module-related routes etc
		include __DIR__ . DIRECTORY_SEPARATOR . 'post_helpers.php';
	}

	public function boot(Router $router)
	{
		$router->group(['namespace'=>'Articles\Http\Controllers'], function()
		{
			include 'Http' . DIRECTORY_SEPARATOR . 'article_routes.php';
		});
	}
}
