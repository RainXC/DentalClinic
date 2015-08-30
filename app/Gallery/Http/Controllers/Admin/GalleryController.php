<?php namespace App\Admin\Http\Controllers;

class GalleryController extends BaseController
{
	protected $modelClassName = 'App\Gallery\Models\Gallery';

	public function index()
	{
		return $this->response->data([
			'data' => $this->model->withVersion()->get(),
			'total' => $this->model->count(),
		]);
	}

	public function show($id)
	{
		return $this->response->data([
			'data' => $this->model->withVersion()->find($id),
		]);
	}

	public function destroy($id)
	{
		$Gallery = $this->model->findOrFail($id);

		if ( ! $Gallery->delete())
		{
			return $this->response->error("Something went wrong when deleting Gallery with ID {$id}");
		}

		return $this->response->message('Gallery successfully deleted');
	}

	public function store()
	{

	}

	public function update($id)
	{

	}
}
