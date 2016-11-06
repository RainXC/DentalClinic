<?php namespace App\Http\Controllers;

use App\Http\Requests\ContactsRequest;
use App\Views\ContactsView;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller {

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
		$view = new ContactsView();

		return $view->render();
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
            'email' => $request->input('email'),
            'text'  => $request->input('text')
        ];

        mail('d.cercel@webdelo.org', 'Обращение с сайта rusanna-dent.md', "
            Имя: $data[name] \r\n
            Телефон: $data[phone] \r\n
            E-mail: $data[email] \r\n
            Сообщение: $data[text] \r\n
        " );

        return response()->json(true);
	}

}
