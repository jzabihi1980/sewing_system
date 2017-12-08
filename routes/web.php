<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// Route::get('/dashbord', function () {
//     return view('welcome');
// });

// Route::get('/add-order', );
// Route::get('/whole-order');
// Route::get('/material-tkani');
// Route::get('/material-dop');
// Route::get('/auto');
// Route::get('/werk-dop');
// Route::get('/client');
Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/add-order', 'HomeController@addOrder');
Route::get('/orders', 'HomeController@orders');
Route::get('/order/status-true/{id}', 'HomeController@statusTrue');
Route::get('/order/dell-orders/{id}', 'HomeController@dellOrders');
Route::get('/order/get-excel/{id}', 'HomeController@getExcel');
Route::post('/order/post-add-order', 'HomeController@postAddOrder');

Route::get( 'clients',				'ClientController@indexPage');
Route::get( 'clients/get/{id}',		'ClientController@getClient');
Route::get( 'clients/add',			'ClientController@addPage');
Route::get( 'clients/edit/{id}',	'ClientController@editPage');
Route::post('clients/add',			'ClientController@addClient');
Route::post('clients/edit/{id}',	'ClientController@aditClient');

Route::get('/myprofile', 'HomeController@myprofile');
Route::get('/upd-myprofile/{id}', 'HomeController@updMyprofile');

Route::get('/list-user', 'HomeController@listUser');
Route::post('/user/new-user', 'HomeController@newUser');
Route::post('/user/edit-user', 'HomeController@editUser');
Route::post('/user/dell-user', 'HomeController@dellUser');

Route::get('/list-material', 'HomeController@listMaterial');
Route::post('/material/new-material', 'HomeController@newMaterial');
Route::post('/material/edit-material', 'HomeController@editMaterial');
Route::post('/material/dell-material', 'HomeController@dellMaterial');

Route::get('/add-auto', 'AutoController@addAuto');
Route::get('/list-auto', 'AutoController@listAuto');
Route::get('/edit-auto/{id}', 'AutoController@editAvto');
Route::post('/add-auto/add', 'AutoController@postAddAuto');
Route::post('/edit-auto/edit', 'AutoController@postEditAuto');
Route::delete('/list-auto/delete', 'AutoController@deleteAvto');

Route::get('/material-tkani', 'HomeController@materialTkani');
// Route::post('/material-tkani/get-material-tkani', 'HomeController@getMaterialTkani');
// Route::post('/material-tkani/add-material', 'HomeController@addMaterial');
Route::post('/material-tkani/add-folder-material-tkani', 'HomeController@addFolderMaterialTkani');
Route::post('/material-tkani/edit-folder-material-tkani', 'HomeController@editFolderMaterialTkani');

Route::get('/material-dop', 'HomeController@materialDop');
Route::get('/add-material-dop', 'HomeController@addMaterialDop');
Route::post('post-add-material-dop', 'HomeController@postaddMaterialDop');
Route::get('/upd-material-dop/{id}', 'HomeController@updMaterialDop');

Route::get('/auto', 'HomeController@interiorAuto');
Route::post('/auto/get-auto', 'HomeController@getAuto');
Route::post('/auto/add-auto', 'HomeController@addInteriorAuto');
Route::post('/auto/add-folder-auto', 'HomeController@addFolderAuto');
Route::post('/auto/del-folder-auto', 'HomeController@delFolderAuto');
Route::post('/auto/edit-folder-auto', 'HomeController@editFolderAuto');

Route::get('/werk', 'HomeController@werk');
Route::post('/werk/get-werk-item', 'HomeController@getWerkItem');
Route::post('/werk/get-werk', 'HomeController@getWerk');
Route::post('/werk/add-werk', 'HomeController@addWerk');
Route::post('/werk/add-folder-werk', 'HomeController@addFolderWerk');
Route::post('/werk/del-folder-werk', 'HomeController@delFolderWerk');
Route::post('/werk/edit-folder-werk', 'HomeController@editFolderWerk');
