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

Route::get('/check', function () {
    return view('check');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    //diamond purchase
    Route::get('/diamond', 'App\Http\Controllers\DiamondController@index')->name('diamond');
    Route::get('/diamond/create', 'App\Http\Controllers\DiamondController@create')->name('diamond.create');
    Route::post('/diamond/store', 'App\Http\Controllers\DiamondController@store')->name('diamond.store');
    Route::get('/diamond/edit', 'App\Http\Controllers\DiamondController@edit')->name('diamond.edit');
    Route::post('/diamond/update/{id}', 'App\Http\Controllers\DiamondController@update')->name('diamond.update');
    Route::post('/diamond/destroy', 'App\Http\Controllers\DiamondController@destroy')->name('diamond.destroy');
    //supplier
    Route::get('/supplier', 'App\Http\Controllers\SupplierController@index')->name('supplier');
    Route::get('/supplier/create', 'App\Http\Controllers\SupplierController@create')->name('supplier.create');
    Route::post('/supplier/store', 'App\Http\Controllers\SupplierController@store')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'App\Http\Controllers\SupplierController@edit')->name('supplier.edit');
    Route::post('/supplier/update/{id}', 'App\Http\Controllers\SupplierController@update')->name('supplier.update');
    Route::post('/supplier/{id}/destroy', 'App\Http\Controllers\SupplierController@destroy')->name('supplier.destroy');

    //manager
    Route::get('/manager', 'App\Http\Controllers\ManagerController@index')->name('manager');
    Route::get('/manager/create', 'App\Http\Controllers\ManagerController@create')->name('manager.create');
    Route::post('/manager/store', 'App\Http\Controllers\ManagerController@store')->name('manager.store');
    Route::get('/manager/edit/{id}', 'App\Http\Controllers\ManagerController@edit')->name('manager.edit');
    Route::post('/manager/update/{id}', 'App\Http\Controllers\ManagerController@update')->name('manager.update');
    Route::post('/manager/{id}/destroy', 'App\Http\Controllers\ManagerController@destroy')->name('manager.destroy');

    //working_stock
    Route::get('/working_stock', 'App\Http\Controllers\WorkingStockController@index')->name('working_stock');
    Route::get('/working_stock/create', 'App\Http\Controllers\WorkingStockController@create')->name('working_stock.create');
    Route::post('/working_stock/store', 'App\Http\Controllers\WorkingStockController@store')->name('working_stock.store');
    Route::post('/working_stock/{id}/destroy', 'App\Http\Controllers\WorkingStockController@destroy')->name('working_stock.destroy');

    //ready_stock
    Route::get('/ready_stock', 'App\Http\Controllers\ReadyStockController@index')->name('ready_stock');
    Route::get('/ready_stock/create', 'App\Http\Controllers\ReadyStockController@create')->name('ready_stock.create');
    Route::post('/ready_stock/store', 'App\Http\Controllers\ReadyStockController@store')->name('ready_stock.store');
    Route::get('/ready_stock/fetchData', 'App\Http\Controllers\ReadyStockController@fetchData')->name('ready_stock.fetchData');
    Route::post('/ready_stock/{id}/destroy', 'App\Http\Controllers\ReadyStockController@destroy')->name('ready_stock.destroy');


    //sell_stock
    Route::get('/sell_stock', 'App\Http\Controllers\SellStockController@index')->name('sell_stock');
    Route::get('/sell_stock/create', 'App\Http\Controllers\SellStockController@create')->name('sell_stock.create');
    Route::post('/sell_stock/store', 'App\Http\Controllers\SellStockController@store')->name('sell_stock.store');
    Route::post('/sell_stock/{id}/destroy', 'App\Http\Controllers\SellStockController@destroy')->name('sell_stock.destroy');

    //rate_master 
    Route::get('/rate_master', 'App\Http\Controllers\RateMaster@index')->name('rate_master');
    Route::get('/rate_master/create', 'App\Http\Controllers\RateMaster@create')->name('rate_master.create');
    Route::post('/rate_master/store', 'App\Http\Controllers\RateMaster@store')->name('rate_master.store');

    Route::post('/rates/rates_store', 'App\Http\Controllers\RateMaster@rates_store')->name('rate_master.rates_store');

    Route::get('/rate_master/edit/{id}', 'App\Http\Controllers\RateMaster@edit')->name('rate_master.edit');
    Route::post('/rate_master/update/{id}', 'App\Http\Controllers\RateMaster@update')->name('rate_master.update');
    // Route::post('/rate_master/{id}/destroy', 'App\Http\Controllers\RateMaster@destroy')->name('rate_master.destroy');

    //Report 
    Route::get('/Report', 'App\Http\Controllers\ReportController@index')->name('Report');

    //Inward
    Route::get('/Inward', 'App\Http\Controllers\ReportController@Inward')->name('Inward');
    Route::get('/Inward/genratePDF', 'App\Http\Controllers\ReportController@genratePDF_Inward')->name('Inward.genratePDF');
    Route::post('/search_inward_data', 'App\Http\Controllers\ReportController@searchdata_Inward')->name('Inward.searchdata');


    //OutWard
    Route::get('/Outward', 'App\Http\Controllers\ReportController@Outward')->name('Inward_Outward');
    Route::get('/Outward/genratePDF', 'App\Http\Controllers\ReportController@genratePDF_Outward')->name('Outward.genratePDF');
    Route::post('/search_outward_data', 'App\Http\Controllers\ReportController@searchdata_Outward')->name('Outward.searchdata');


    //Party Labour
    Route::get('/Party_Labour', 'App\Http\Controllers\ReportController@Party_Labour')->name('Party_Labour');
    Route::get('/Party_Labour/genratePDF', 'App\Http\Controllers\ReportController@genratePDF_Party_Labour')->name('Party_Labour.genratePDF');
    Route::post('/search_PartyLabour_data', 'App\Http\Controllers\ReportController@searchdata_Party_Labour')->name('Party_Labour.searchdata');


    //Daimond Trecker
    Route::get('/Daimond_tracker', 'App\Http\Controllers\Daimond_tacker_Controller@index')->name('Daimond_tracker');

    //user change route
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/VMJEWEL', [App\Http\Controllers\HomeController::class, 'firstUser'])->name('home');
    Route::get('/EKLINGJI', [App\Http\Controllers\HomeController::class, 'SecondUser'])->name('home');
});