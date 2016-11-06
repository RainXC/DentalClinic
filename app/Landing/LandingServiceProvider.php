<?php namespace App\Landing;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\Tests\Controller;

class LandingServiceProvider extends ServiceProvider {

	/**
	 * Register the Gallery provider.
	 */
	public function register()
	{
        
	}

	public function boot(Router $router)
	{
		$router->group(['namespace'=>'App\Landing\Http\Controllers'], function()
		{
			include 'Http' . DIRECTORY_SEPARATOR . 'landing_routes.php';
		});
	}
}
