<?php namespace App\Admin\Http\Controllers;

class EmployeesController extends BaseController
{
	protected $modelClassName = 'App\Employees\Models\Employee';

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
		$Employee = $this->model->findOrFail($id);

		if ( ! $Employee->delete())
		{
			return $this->response->error("Something went wrong when deleting Employee with ID {$id}");
		}

		return $this->response->message('Employee successfully deleted');
	}

	public function store()
	{

	}

	public function update($id)
	{

	}
}
