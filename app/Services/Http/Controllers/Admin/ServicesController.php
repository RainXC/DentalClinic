<?php namespace App\Admin\Http\Controllers;

class ServicesController extends BaseController
{
	protected $modelClassName = 'App\Services\Models\Service';

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
		$Service = $this->model->findOrFail($id);

		if ( ! $Service->delete())
		{
			return $this->response->error("Something went wrong when deleting Service with ID {$id}");
		}

		return $this->response->message('Service successfully deleted');
	}

	public function store()
	{

	}

	public function update($id)
	{

	}
}
