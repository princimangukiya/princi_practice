<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/diamond','App\Http\Controllers\DiamondController@index')->name('diamond');
Route::get('/diamond/create','App\Http\Controllers\DiamondController@create')->name('diamond.create');
Route::post('/diamond/store','App\Http\Controllers\DiamondController@store')->name('diamond.store');