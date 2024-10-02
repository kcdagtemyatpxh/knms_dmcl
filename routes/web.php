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

Route::get('/', function () {
    return view('welcome');
});
Route::get('api/trangchu','App\Http\Controllers\ApiController@trangchu')->name('api.trangchu');
Route::get('layout/trangchu','App\Http\Controllers\LayoutController@trangchu')->name('layout.trangchu');