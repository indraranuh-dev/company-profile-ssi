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


Auth::routes(['verify' => true, 'register' => false]);

// Route::get('/product/{category}/{subCategory}/{product}', function (Request $request) {
//     if (!$request->category && !$request->subCategory) return abort(404, 'Halaman tidak ditemukan');
// });

Route::get('/', 'CompanyProfileController@index')->middleware('VisitorCounter')->name('index');
Route::get('/hubungi-kami', 'CompanyProfileController@contactUs')->middleware('VisitorCounter')->name('contact');

Route::group([
    'prefix' => 'produk',
    'as' => 'product.',
    'middleware' => 'VisitorCounter'
], function () {
    Route::get('/{subCategory}/{supplier}', 'ProductController@product')->name('index');
});

Route::get('/image/{image}', 'ProductController@getProductImage')->name('productImage');