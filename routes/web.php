<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/auth/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('user.utama');
});

Route::get('/admin/login', function () {
    return view('admin.loginAdmin');
});

Route::get('/admin','crudController@kalenderAdmin');
route::get('/admin/pesan','pemesananController@adminPesanan');
Route::get('/admin/setuju/{id_pesanan}','pemesananController@setujuPesanan');
Route::get('/admin/tolak/{id_pesanan}','pemesananController@tolakPesanan');
route::get('/admin/dekor','crudController@indexDekor');
route::post('/admin/tambahDekor','crudController@storeDekor');
route::get('/admin/item_dokum','crudController@indexDokum');
route::post('/admin/tambahDokum','crudController@storeDokum');

route::get('/formPesan2','pemesananController@indexFormPesan2');
route::post('/pesan2','pemesananController@store2');
route::post('/pesancs2','pemesananController@storeCS2');
route::post('/pesanfix2','pemesananController@storefix2');

route::get('/admin/historyBayar','pembayaranController@indexBayar');
Route::get('/admin/bayar/{id_pesanan}','pembayaranController@bayarAdmin');
route::post('/admin/lunas','pembayaranController@store2');

// Route::resource('admin', pemesananController::class);


Route::get('/user', function () {
    return view('user.utama');
});
route::get('/item_dokum','infoController@indexDokum');
route::get('/dekor','infoController@indexDekor');
route::get('/paket','infoController@indexPaket');
route::get('/history','pemesananController@historyPesan');

route::get('/formPesan','pemesananController@indexFormPesan');
route::post('/pesan','pemesananController@store');
route::post('/pesancs','pemesananController@storeCS');
route::post('/pesanfix','pemesananController@storefix');

Route::get('/bayar/{id_pesanan}','pembayaranController@bayarUser');
route::post('/lunas','pembayaranController@store');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function () {
    return view('user.utama');
});
