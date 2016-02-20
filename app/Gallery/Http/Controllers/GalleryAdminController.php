<?php namespace App\Gallery\Http\Controllers;

use App\Gallery\Models\AlbumImage;
use App\Gallery\Models\Album;
use App\Gallery\Models\ObjectImage;
use App\Noop;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use JildertMiedema\LaravelPlupload\Facades\Plupload;

class GalleryAdminController extends BaseController
{
	protected $modelClassName = 'App\Gallery\Models\Gallery';

    public function __construct()
    {
//		$this->middleware('guest');
    }

	public function index()
	{
		return $this->showAll();
	}

	public function showAll()
	{
		$albums = new Album();

		return View::make('gallery.admin.list', [ 'albums' => $albums ]);
	}

	public function show($id)
	{
		return $this->response->data([
			'data' => $this->model->withVersion()->find($id),
		]);
	}

	public function destroy($id)
	{
        $albums = new Album();
        $album  = $albums->findOrFail($id);

        if ( ! $album->delete())
        {
            return response()->json(['result'=>false, 'error'=>"Something went wrong when deleting Employee with ID {$id}"]);
        }

        return response()->json(true);
	}

	public function create()
	{
		return View::make('gallery.admin.create', [
			'album'     => new Noop(),
		]);
	}

	public function edit($id)
	{
		$albums = new Album();
		$album = $albums->findOrFail($id);

		return View::make('gallery.admin.edit', [
			'album'    => $album,
			'albums'   => $albums,
		]);
	}

	public function store()
	{
		$album     = new Album();

		$album->authorId   = Auth::id();
		$album->name = Input::get('name');
		$album->description = Input::get('description');
		$album->save();

		return response()->json(true);
	}

	public function update($id)
	{
        $albums = new Album();
        $album = $albums->findOrFail($id);

        $album->authorId   = Auth::id();
        $album->name = Input::get('name');
        $album->description = Input::get('description');
        $album->save();

        return response()->json(true);
	}

    public function uploadImage()
    {
        return Plupload::receive('file', function ($file)
        {
            $albums = new Album();
            $album  = $albums->findOrFail($_GET['objectId']);
            $imageHandler = new ObjectImage($album);
            if ( $imageHandler->add($file) ) {
                return ['result' => 'ready', 'url' => $imageHandler->getImage()->getImage('640x480') ];
            } else
                return 'not ready';
        });
    }
}
