<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;
use App\Model\InteriorAuto;
use App\Model\TypeMaterial;
use App\Model\Order;
use App\Model\WorkDop;
use App\Model\Material;
use App\Model\Auto;
use App\User;
use Auth;
use Excel;

// public function getMenu()
// {
//   //  $menu = ['Главная' => ];
// }
// Request::create('/updateprogress', 'GET', array());
function generateFolderRecursion(&$array,$key)
{
	$newElement = 1;
	$tmpArray = [];
	for ($i=0; $i < $newElement; $i++) { 
		$tmp = [];
		$tmp['href'] = $array[$key]['id'];
		$tmp['text'] = $array[$key]['name'];
		$keyRecursion = array_search($array[$key]['id'], array_column($array, 'sid'));
		if ($keyRecursion != false)
		{
			$tmp['nodes'] = generateFolderRecursion($array, $keyRecursion);
		}
		$tmpArray[] = $tmp;
		$folder = $array[$key]['sid'];
		array_splice($array, $key, 1);
		$key = array_search($folder, array_column($array, 'sid'));     
		if ($key != false)
			$newElement ++;
	}
	return $tmpArray;
}

function generateFolder($folders)
{
	$folders = $folders->toArray();
	$newFolders = [];
	for ($i=0; $i < count($folders); $i++) 
	{ 
		$tmp = [];
		$tmp['href'] = $folders[$i]['id'];
		$tmp['text'] = $folders[$i]['name'];
		$arrayFolder[$folders[$i]['id']] = $tmp;
		$key = array_search($folders[$i]['id'], array_column($folders, 'sid'));
		if ($key != false)
		{
			$tmp['nodes'] = generateFolderRecursion($folders, $key);
		}
		$newFolders[] = $tmp;
	}
	return $newFolders;
}
 function generate_password($number)
  {
	$arr = array('a','b','c','d','e','f',
				 'g','h','i','j','k','l',
				 'm','n','o','p','r','s',
				 't','u','v','x','y','z',
				 'A','B','C','D','E','F',
				 'G','H','I','J','K','L',
				 'M','N','O','P','R','S',
				 'T','U','V','X','Y','Z',
				 '1','2','3','4','5','6',
				 '7','8','9','0');
	// Генерируем пароль
	$pass = "";
	for($i = 0; $i < $number; $i++)
	{
	  // Вычисляем случайный индекс массива
	  $index = rand(0, count($arr) - 1);
	  $pass .= $arr[$index];
	}
	return $pass;
  }
class HomeController extends Controller
{
	private $emailAdmin = 'rusveld@bk.ru';
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function orders()
	{
		$Orders = Order::all();
		return view('pages.orders', ['orders' => $Orders]);
	}
	public function addOrder()
	{
		// $materials = Material::where('type', 'item')->get();
		$subMaterialTkani = generateFolder(TypeMaterial::all());
		$WorkDops = generateFolder(WorkDop::where('type', 'folder')->get());
		$InteriorAuto = generateFolder(InteriorAuto::where('type', 'folder')->get());
		$Materials = Material::all();
		$Clients = Client::all();
		$Masters = User::where('status', 1)->get();
		return view('pages.addOrder', [
				// 'materials' => $materials,
				'subMaterialTkani' => json_encode($subMaterialTkani),
				'WorkDops' => json_encode($WorkDops),
				'InteriorAuto' => json_encode($InteriorAuto),
				'materials' => $Materials,
				'clients' => $Clients,
				'masters' => $Masters
			]);
	}
	public function postAddOrder(Request $request)
	{
	   $Request = $request->all();
	   $OrderParams = json_decode($Request['arrayPrice'], true);
	   $materialTkani = array_filter($OrderParams['materialTkani']);
	   $work = array_filter($OrderParams['work']);
	   $interior = array_filter($OrderParams['interior']);
	   unset($Request['arrayPrice']);
	   $Request['materials_id'] = json_encode($materialTkani);
	   $Request['work_dops_id'] = json_encode($work);
	   $Request['autos_id'] = json_encode($interior);
	   $Request['status'] = 0;
	   $Request['user_id'] = Auth::user()->id;
	   $Request['date_priem'] = date('Y-m-d H:i:s');
	   $Request['date_end'] = \DateTime::createFromFormat('d.m.Y', $Request['date_end'])->format('Y-m-d');   
	   Order::create($Request);
	  
	}
	public function statusTrue($id)
	{
		$Order = Order::find($id);
		$Order->update(['status' => 1]);
		return back();
	}
	public function dellOrders($id)
	{
		$Order = Order::find($id);
		$Order->delete();
		return back();
	}
	public function getExcel($id='0')
	{
		$Order = Order::find($id);
		$materials_id = json_decode($Order->materials_id, true);
		$materials = [];
		foreach ($materials_id as $value) {
			$tmp = [];
			$tmp['price'] = $value['price'];
			$tmp['count'] = $value['count'];
			$tmp['type'] = Material::find($value['materialID'])->name;
			$tmp['name'] = TypeMaterial::find($value['materialTkani'])->name;
			$materials[] = $tmp;
		}
		$autos_id = json_decode($Order->autos_id, true);
		$autos = [];
		foreach ($autos_id as $value) {
			$tmp = [];
			$tmp['price'] = $value['price'];
			$tmp['count'] = $value['count'];
			$tmp['name'] = InteriorAuto::find($value['interiorAuto'])->name;
			$tmp['type'] = InteriorAuto::find($value['type'])->name;
			$autos[] = $tmp;
		}
		$work_dops_id = json_decode($Order->work_dops_id, true);
		$work_dops = [];
		foreach ($work_dops_id as $value) {
			$tmp = [];
			$tmp['price'] = $value['price'];
			$tmp['count'] = $value['count'];
			$tmp['name'] = WorkDop::find($value['work'])->name;
			$tmp['type'] = WorkDop::find($value['type'])->name;
			$work_dops[] = $tmp;
		}
		$data = [ 'materials' => $materials,
					'autos' => $autos,
					'work_dops' => $work_dops];
		// return view('excel.order', [
		//             'materials' => $materials,
		//             'autos' => $autos,
		//             'work_dops' => $work_dops,
		//         ]);
		Excel::create('order', function($excel) use($data)  {
			$excel->sheet('Заявка', function($sheet) use($data)  {
				$sheet->loadView('excel.order', [
					'materials' => $data['materials'],
					'autos' => $data['autos'],
					'work_dops' => $data['work_dops'],
				]);
			});
		})->download('xlsx');
	}
	public function listUser()
	{
		$userStatus = [
			1 => ['id' => 1, 'name' => 'Мастер'],
			2 => ['id' => 2, 'name' => 'Менеджер'],
			3 => ['id' => 3, 'name' => 'Склад'],
			4 => ['id' => 4, 'name' => 'Администратор']
		];
		$Users = User::all();
		return view('pages.listUser', ['users' => $Users, 'userStatus' => $userStatus]);
	}
	public function newUser(Request $request)
	{
		$Request = $request->all();
		$password = generate_password(8);
		$Request['password'] = bcrypt($password);
		return User::create($Request);
	}
	public function editUser(Request $request)
	{
		$Request = $request->all();
		$User = User::find($Request['id']);
		$User->update($Request);
	}
	public function dellUser(Request $request)
	{
		$Request = $request->all(); 
		$User = User::find($Request['id']);
		$User->delete();
	}
	/*********  material   ***********/
	public function listMaterial()
	{   
		$Materials = Material::all();
		return view('pages.listMaterial', ['materials' => $Materials]);
	}
	public function newMaterial(Request $request)
	{
		$Request = $request->all();
		return Material::create($Request);
	}
	public function editMaterial(Request $request)
	{
		$Request = $request->all();
		$Material = Material::find($Request['id']);
		$Material->update($Request);
	}
	public function dellMaterial(Request $request)
	{
		$Request = $request->all();
		$Material = Material::find($Request['id']);
		$Material->delete();
	}
	/********************************/

	/******  material tkani   *******/
	public function materialTkani()
	{   
		$materialsCats = generateFolder(TypeMaterial::all());
		return view('pages.materialTkani', ['materialsCats' => json_encode($materialsCats)]);
	}
	// public function getMaterialTkani(Request $request)
	// {
	//     $Requset = $request->all();
	//     return $materialsAndTkanis = TypeMaterial::where('sid', $Requset['id'])->where('type', 'item')->get();
	// }
	// public function addMaterial(Request $request)
	// {
	//     return Material::create($request->all());
	// }
	// public function postAddMaterialTkani(Request $request)
	// {
	//     $TypeMaterial = TypeMaterial::create($request->all());
	//     //return  $material;
	// }
	public function addFolderMaterialTkani(Request $request)
	{
		$Request = $request->all();
		TypeMaterial::create($Request);
	}
	public function editFolderMaterialTkani(Request $request)
	{
		$Request = $request->all();
		$TypeMaterial = TypeMaterial::find($Request['id']);
		$TypeMaterial->update(['name' => $Request['name']]);
	}
	/****************************/

	/*******  interiorAuto   ********/
	public function interiorAuto()
	{
		$interiorAutoFolder = generateFolder(InteriorAuto::where('type', 'folder')->get());
		return view('pages.auto', ['interiorAutoFolder' => json_encode($interiorAutoFolder)]);
	}
	public function addInteriorAuto(Request $request)
	{
		$Request = $request->all();
		$Request['type'] = 'item';
		return $InteriorAuto = InteriorAuto::create($Request);
	}
	public function getAuto(Request $request)
	{
		$Request = $request->all();
		return InteriorAuto::where('sid', $Request['id'])->where('type', 'item')->get();
	}
	public function addFolderAuto(Request $request)
	{
		$Request = $request->all();
		$Request['type'] = 'folder';
		InteriorAuto::create($Request);
	}
	public function delFolderAuto(Request $request)
	{
		$Request = $request->all();
		$InteriorAuto = InteriorAuto::find($Request['id']);
		$InteriorAuto->delete();
	}
	public function editFolderAuto(Request $request)
	{
		$Request = $request->all();
		$InteriorAuto = InteriorAuto::find($Request['id']);
		$InteriorAuto->update(['name' => $Request['name']]);
	}
	/****************************/

	/*********  werk   **********/
	public function werk()
	{
		$WorkDops = WorkDop::where('type', 'folder')->get();
		$WorkDops = generateFolder($WorkDops);
		return view('pages.werk', ['WorkDops' => json_encode($WorkDops)]);
	}
	public function getWerkItem(Request $request)
	{
		$Request = $request->all();
		$WorkDopsItems = WorkDop::where('type', 'item')->where('sid', $Request['id'])->get();
		return $WorkDopsItems;
	}
	public function getWerk(Request $request)
	{
		$Request = $request->all();
		return $materialsAndTkanis = WorkDop::where('sid', $Request['id'])->where('type', 'item')->get();
	}
	public function addWerk(Request $request)
	{
		$Request = $request->all();
		$Request['type'] = 'item';
		return $WorkDop = WorkDop::create($Request);
	}
	public function addFolderWerk(Request $request)
	{
		$Request = $request->all();
		$Request['type'] = 'folder';
		WorkDop::create($Request);
	}
	public function delFolderWerk(Request $request)
	{
		$Request = $request->all();
		$WorkDop = WorkDop::find($Request['id']);
		$WorkDop->delete();
	}
	public function editFolderWerk(Request $request)
	{
		$Request = $request->all();
		$WorkDop = WorkDop::find($Request['id']);
		$WorkDop->update(['name' => $Request['name']]);
	}
	/****************************/
	public function index()
	{
		return view('pages.home');
	}
}
