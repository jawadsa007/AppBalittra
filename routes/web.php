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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Pelanggan
Route::get('/data-pelanggan', 'PelangganController@index')->name('pelanggan.index');
Route::get('/tambah-pelanggan', 'PelangganController@create')->name('pelanggan.create');
Route::post('/tambah-pelanggan', 'PelangganController@store')->name('pelanggan.store');
Route::get('/edit-data-pelanggan/{pelanggan}', 'PelangganController@edit')->name('pelanggan.edit');
Route::patch('/edit-data-pelanggan/{pelanggan}', 'PelangganController@update')->name('pelanggan.update');
Route::delete('/hapus-data-pelanggan/{pelanggan}', 'PelangganController@destroy')->name('pelanggan.destroy');
Route::get('/laporan-pelanggan/{pelanggan}', 'PelangganController@pdf')->name('pelanggan.pdf');