<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Client;
use App\Model\Auto;

class ClientController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function dataFormat($array) 
	{
		$data['data']['contact-phone-1'] = $array['contact-phone-1'];
		$data['data']['contact-fio-1'] = $array['contact-fio-1'];
		$data['data']['contact-phone-2'] = $array['contact-phone-2'];
		$data['data']['contact-fio-2'] = $array['contact-fio-2'];
		$data['data']['city'] = $array['city'];
		$data['fio'] = $array['fio'];
		$data['auto_id'] = $array['auto_id'];
		$data['phone'] = $array['phone'];
		$data['comment'] = $array['comment'];
		return $data;
	}
	public function indexPage()
	{
		$Clients = Client::all();
		return view('pages.clients', ['clients' => $Clients]);
	}
	public function addPage()
	{
		$autos = Auto::all();
		return view('pages.clients-add-edit', [
			'action' => action('ClientController@addClient'),
			'autos' => $autos
		]);
	}
	public function editPage()
	{
		return view('pages.clients-add-edit', [
			'action' => action('ClientController@aditClient')
		]);
	}
	public function addClient(Request $request)
	{
		$Request = $request->all();
		$Request = $this->dataFormat($Request);
		$Request['data'] = json_encode($Request['data']);	
		$client = Client::create($Request);
		return \Redirect::back()->withErrors(['msg' => '<strong>Сохранния!</strong> Клиент ' . $client->fio . ' был сохранен.']);
	}
	public function aditClient(Request $request)
	{
		$Request = $request->all();
	}

}
