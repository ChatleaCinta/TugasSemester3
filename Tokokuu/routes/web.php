<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',function(){
    return view('login');
});
Route::get('login', 'Login@index');
Route::post('/login/cek', 'Login@cek');
Route::get('/dashboard', 'Dashboard@index');
Route::get('/nota', 'Dashboard@nota');

Route::get('/kontak', 'kontak@index');
Route::get('/kontak/tambah', 'kontak@tambah');
Route::post('/kontak/simpan_tambah', 'kontak@simpan_tambah');
Route::get('kontak/{kontak}/edit', 'kontak@edit');
Route::post('kontak/{kontak}/update', 'kontak@update');
Route::get('kontak/{kontak}/delete', 'kontak@delete');

Route::get('/', 'barang@index');
Route::get('/barang/tambah', 'barang@tambah');
Route::post('/barang/simpan_tambah', 'barang@simpan_tambah');
Route::get('barang/{barang}', 'barang@show');
Route::get('barang/{barang}/edit', 'barang@edit');
Route::post('barang/{barang}/update', 'barang@update');
Route::get('barang/{barang}/delete', 'barang@delete');

Route::get('/transaksi', 'transaksi@index');
Route::get('/tambah_brng/{id_barang}','transaksi@tambah');
Route::get('transaksi/clear_all_cart','transaksi@clear_all');
Route::get('transaksi/simpan_cart_db','transaksi@simpan_cart_db');
Route::get('transaksi/hps_item/{id}','transaksi@hps_item');

Route::get('/logout','login@logout');


// Route::group(['middleware'=>'cek_login'],function(){
//     if(Session::get('status')=='admin'){
//             Route::get('/report','report@index');
//         }elseif(Session::get('status')=='kasir'){
//                 Route::get('transaksi','report@index');
//             }
//             });
            