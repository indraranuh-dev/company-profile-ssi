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

Route::get('/', 'CompanyProfileController@index')->middleware('VisitorCounter')->name('index');
Route::get('/servis', 'CompanyProfileController@services')->middleware('VisitorCounter')->name('services');
Route::get('/tentang-kami', 'CompanyProfileController@aboutUs')->middleware('VisitorCounter')->name('about');
Route::get('/hubungi-kami', 'CompanyProfileController@contactUs')->middleware('VisitorCounter')->name('contact');
Route::post('/hubungi-kami', 'CompanyProfileController@sendEmail')->name('sendMail');
Route::post('/harga', 'CompanyProfileController@pricing')->name('pricing');

Route::group([
    'prefix' => 'produk',
    'as' => 'product.',
    'middleware' => 'VisitorCounter'
], function () {
    Route::get('/', 'ProductController@index')->name('index');

    # Route hvac
    Route::group([
        'prefix' => 'hvac',
        'as' => 'hvac.'
    ], function () {
        Route::get('/', 'ProductController@getCategory')->name('index');
        Route::get('/{subCategory}', 'ProductController@getProducts')->name('subCategory.index');
        Route::get('/{subCategory}/{supplier}', 'ProductController@getSupplierProducts')->name('vendor.index');
        Route::get('/{subCategory}/{supplier}/{product}', 'ProductController@showProduct')->name('show');
    });

    # Route general-supplies
    Route::group([
        'prefix' => 'general-supplies',
        'as' => 'general-supplies.'
    ], function () {
        Route::get('/', 'GeneralSuppliesController@index')->name('index');
        Route::get('/{product}', 'GeneralSuppliesController@showProduct')->name('show');
    });

    # Route filtration
    Route::group([
        'prefix' => 'filtration',
        'as' => 'filtration.'
    ], function () {
        Route::get('/', 'JafController@index')->name('index');
        Route::get('/{supplier}', 'JafController@products')->name('supplier.index');
        Route::get('/{supplier}/{product}', 'JafController@showProduct')->name('show');
    });
});

Route::get('/image/{image}', 'ProductController@getProductImage')->name('productImage');
Route::get('/icon/{icon}', 'ProductController@getFeatureIcon')->name('icon');
Route::get('/fitur/{slug}/detail', 'Api\FeatureApiController@show')->name('feature');