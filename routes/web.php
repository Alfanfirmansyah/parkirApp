<?php
use App\http\middleware\IsAdmin;
use App\http\middleware\IsOperator;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::group(['middleware' => IsAdmin::class], function () {
	
	Route::get('/admin', 'AdminController@index');
	Route::resource('customer','CustomerController');
	Route::resource('user','UserController');
	Route::resource('role','RoleController');

});

Route::group(['middleware' => IsOperator::class], function () {
	
	Route::get('/operator', 'OperatorController@index');
	Route::resource('place','PlaceController');
	Route::resource('kategori','KategoriController');
	
});

