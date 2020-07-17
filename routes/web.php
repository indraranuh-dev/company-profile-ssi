<?php

use Illuminate\Http\Request;
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
})->middleware('VisitorCounter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product/{category}/{subCategory}/{product}', function (Request $request) {
    if (!$request->category && !$request->subCategory) return abort(404, 'Halaman tidak ditemukan');
});

Route::view('test-view', 'test');