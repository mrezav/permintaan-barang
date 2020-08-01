<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('permintaan/{id}', 'PermintaanController@permintaan');
Route::get('list-permintaan', 'PermintaanController@list_permintaan');
Route::delete('permintaan/{id}', 'PermintaanController@delete_permintaan');
Route::get('detail/{id}', 'PermintaanController@detail');
Route::get('list-barang', 'PermintaanController@list_barang');
Route::get('brg-terpenuhi', 'PermintaanController@brg_terpenuhi');
Route::get('barang/{kode}', 'PermintaanController@barang');
Route::get('list-karyawan', 'PermintaanController@list_karyawan');
Route::get('lokasi/{kode}', 'PermintaanController@lokasi');
Route::post('store', 'PermintaanController@store');
