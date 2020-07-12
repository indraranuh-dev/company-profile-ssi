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



Route::group([
    'prefix' => '_admin',
    'as' => 'admin.'
], function () {

    Route::get('/', 'AdminController@index')->name('index');

    # Route supplier
    Route::group([
        'prefix' => 'supplier',
        'as' => 'supplier.'
    ], function () {
        Route::get('/', 'SupplierController@index')->name('index');
        Route::get('/tambah', 'SupplierController@create')->name('create');
        Route::post('/', 'SupplierController@store')->name('store');
        Route::get('/{id}', 'SupplierController@show')->name('show');
        Route::get('/{id}/ubah', 'SupplierController@edit')->name('edit');
        Route::put('/{id}', 'SupplierController@update')->name('update');
        Route::delete('/{id}', 'SupplierController@destroy')->name('destroy');
    });

    # Route product
    Route::group([
        'prefix' => 'produk',
        'as' => 'product.'
    ], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/tambah', 'ProductController@create')->name('create');
        Route::post('/', 'ProductController@store')->name('store');
        Route::put('/{id}', 'ProductController@update')->name('update');
        Route::delete('/{id}', 'ProductController@destroy')->name('destroy');
    });

    # Route kategori produk
    Route::group([
        'prefix' => 'produk/kategori',
        'as' => 'prod.category.'
    ], function () {
        Route::get('/', 'ProductCategoryController@index')->name('index');
        Route::post('/', 'ProductCategoryController@store')->name('store');
        Route::put('/{id}', 'ProductCategoryController@update')->name('update');
        Route::delete('/{id}', 'ProductCategoryController@destroy')->name('destroy');
    });

    # Route sub kategori produk
    Route::group([
        'prefix' => 'produk/sub-kategori',
        'as' => 'prod.subcategory.'
    ], function () {
        Route::get('/', 'ProductSubCategoryController@index')->name('index');
        Route::post('/', 'ProductSubCategoryController@store')->name('store');
        Route::put('/{id}', 'ProductSubCategoryController@update')->name('update');
        Route::delete('/{id}', 'ProductSubCategoryController@destroy')->name('destroy');
    });

    # Route sub kategori produk
    Route::group([
        'prefix' => 'produk/jenis-produk',
        'as' => 'prod.type.'
    ], function () {
        Route::get('/', 'ProductTypeController@index')->name('index');
        Route::get('/tambah', 'ProductTypeController@create')->name('create');
        Route::post('/', 'ProductTypeController@store')->name('store');
        Route::get('/{id}/ubah', 'ProductTypeController@edit')->name('edit');
        Route::put('/{id}', 'ProductTypeController@update')->name('update');
        Route::delete('/{id}', 'ProductTypeController@destroy')->name('destroy');
    });
});

Route::get('test', 'ProductSubCategoryController@test');