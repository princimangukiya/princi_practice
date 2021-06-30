<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;
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



Route::get('/check', function () {
    return view('check');
});
//diamond purchase
Route::get('/diamond','App\Http\Controllers\DiamondController@index')->name('diamond');
Route::get('/diamond/create','App\Http\Controllers\DiamondController@create')->name('diamond.create');
Route::post('/diamond/store','App\Http\Controllers\DiamondController@store')->name('diamond.store');

//supplier
Route::get('/supplier','App\Http\Controllers\SupplierController@index')->name('supplier');
Route::get('/supplier/create','App\Http\Controllers\SupplierController@create')->name('supplier.create');
Route::post('/supplier/store','App\Http\Controllers\SupplierController@store')->name('supplier.store');
Route::get('/supplier/edit/{id}','App\Http\Controllers\SupplierController@edit')->name('supplier.edit');
Route::post('/supplier/update/{id}','App\Http\Controllers\SupplierController@update')->name('supplier.update');
Route::post('/supplier/{id}/destroy','App\Http\Controllers\SupplierController@destroy')->name('supplier.destroy');

//manager
Route::get('/manager','App\Http\Controllers\ManagerController@index')->name('manager');
Route::get('/manager/create','App\Http\Controllers\ManagerController@create')->name('manager.create');
Route::post('/manager/store','App\Http\Controllers\ManagerController@store')->name('manager.store');
Route::get('/manager/edit/{id}','App\Http\Controllers\ManagerController@edit')->name('manager.edit');
Route::post('/manager/update/{id}','App\Http\Controllers\ManagerController@update')->name('manager.update');
Route::post('/manager/{id}/destroy','App\Http\Controllers\ManagerController@destroy')->name('manager.destroy');

//working_stock
Route::get('/working_stock','App\Http\Controllers\WorkingStockController@index')->name('working_stock');
Route::get('/working_stock/create','App\Http\Controllers\WorkingStockController@create')->name('working_stock.create');
Route::post('/working_stock/store','App\Http\Controllers\WorkingStockController@store')->name('working_stock.store');
Route::post('/working_stock/{id}/destroy','App\Http\Controllers\WorkingStockController@destroy')->name('working_stock.destroy');

//ready_stock
Route::get('/ready_stock','App\Http\Controllers\ReadyStockController@index')->name('ready_stock');
Route::get('/ready_stock/create','App\Http\Controllers\ReadyStockController@create')->name('ready_stock.create');
Route::post('/ready_stock/store','App\Http\Controllers\ReadyStockController@store')->name('ready_stock.store');
Route::post('/ready_stock/{id}/destroy','App\Http\Controllers\ReadyStockController@destroy')->name('ready_stock.destroy');
