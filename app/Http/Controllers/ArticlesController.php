<?php namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Views\AboutView;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Shown the contacts page
	 *
	 * @return Response
	 */
	public function contacts()
	{
		return view('contacts');
	}

	/**
	 * Shown the contacts page
	 *
	 * @return Response
	 */
	public function about()
	{
		$view = new AboutView();
		return $view->printTemplate();
	}

    /**
	 * Shown the contacts page
	 *
	 * @return Response
	 */
	public function ajaxSendMessage(ContactsRequest $request)
	{
        $data = [
            'name'  => $request->input('name'),
            'phone' => $request->input('phone'),
            'text'  => $request->input('text')
        ];

        Mail::queue('emails.contacts', $data, function($message)
        {
            $message->to('d.cercel@webdelo.org', 'Дмитрий Черчел')->subject('Обращение с сайта dent.app');
        });

        return response()->json(true);
	}

}
