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
Route::post('/hubungi-kami', 'CompanyProfileController@sendEmail')->name('sendMail');

Route::group([
    'prefix' => 'produk',
    'as' => 'product.',
    'middleware' => 'VisitorCounter'
], function () {
    Route::get('/{category}', function ($category) {
    })->name('category.index');
    Route::get('/{category}/{subCategory}', function ($category, $subCategory) {
    })->name('subCategory.index');
    Route::get('/{category}/{subCategory}/{supplier}', 'ProductController@product')->name('vendor.index');
    Route::get('/{category}/{subCategory}/{supplier}/{product}', 'ProductController@showProduct')->name('show');
});

Route::get('/image/{image}', 'ProductController@getProductImage')->name('productImage');
Route::get('/icon/{icon}', 'ProductController@getFeatureIcon')->name('icon');