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
	return view('welcome');
});

Auth::routes();

Route::get('dashboard', 'Dashboard@index')->name('index');

Route::get('pivot-bus', 'ManagemenBus@pivot')->name('pivot.bus');
Route::get('show-bus/{id}', 'ManagemenBus@showBus');

Route::get('data-bus', 'ManagemenBus@data')->name('data.bus');
Route::get('managemen-jadwal', 'Jadwal@index')->name('index.jadwal');
Route::get('data-transaksi', 'Transaksi@index')->name('index.transaksi');
Route::get('riwayat-transaksi', 'Transaksi@riwayat')->name('riwayat.transaksi');

// all JQUERY
Route::get('nama-bus/{id}', 'ApiJquery@namaBus'); 
Route::get('data-bus/{id}', 'ApiJquery@dataBus'); 

// RUTE MANAGEMEN BUS
Route::prefix('managemen-bus')->group(function () {
	Route::get('/', 'ManagemenBus@index')->name('index.bus');

	Route::post('store-pivot', 'ManagemenBus@storePivotBusRute')->name('store.pivot');
	Route::post('store-bus', 'ManagemenBus@storeBus')->name('store.bus'); // menginput data bus
	Route::post('store-tipe-bus', 'ManagemenBus@storeTipeBus')->name('store.tipebus');
	Route::post('store-rute', 'ManagemenBus@storeRute')->name('store.rute');

	Route::put('edit-bus/{id}', 'ManagemenBus@editBus');
	Route::put('edit-tipe-bus/{id}', 'ManagemenBus@editTipe');
	Route::put('edit-rute/{id}', 'ManagemenBus@editRute');
	Route::put('edit-bus/{id}', 'ManagemenBus@editPivot');
});

// RUTE MANAGEMEN JADWAL
Route::prefix('managemen-jadwal')->group(function() {
	Route::get('/', 'Jadwal@index')->name('index.jadwal');
	Route::post('/', 'Jadwal@store')->name('store.jadwal'); // input data admin
});

// RUTE MANAGEMEN ADMIN
Route::prefix('managemen-admin')->group(function() {
	Route::get('/', 'ManagemenAdmin@index')->name('index.admin');
	Route::post('/', 'ManagemenAdmin@store')->name('store.admin'); // input data admin
});


