<?php namespace App\Landing\Http\Controllers;

use App\Employees\Models\Employee;
use App\Employees\Views\EmployeesView;
use App\Gallery\Models\Album;
use App\Gallery\Models\Gallery;
use App\Gallery\Views\AlbumsLandingView;
use App\Services\Models\Category;
use App\Services\Models\Service;
use App\Services\Views\ServicesLandingView;
use Illuminate\Routing\Controller as BaseController;
use View;


class LandingController extends BaseController
{

    public function show()
    {
        return View::make('landing.show');
    }

    public function employees()
    {
        return response()->json( new EmployeesView(Employee::where('statusId', 1)) );
    }

    public function services()
    {

        return response()->json( new ServicesLandingView(Category::where('statusId', 1)) );
    }

    public function gallery()
    {
        return response()->json( new AlbumsLandingView(Album::where('statusId', 1)) );
    }

}