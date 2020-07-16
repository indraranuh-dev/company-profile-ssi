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
        Route::get('/{slug}/detail', 'ProductController@show')->name('show');
        Route::get('/{id}/edit', 'ProductController@edit')->name('edit');
        Route::put('/{id}', 'ProductController@update')->name('update');
        Route::delete('/{id}', 'ProductController@destroy')->name('destroy');
        Route::get('/image/{image}', 'ProductController@getProductImage')->name('image');
    });

    # Route kategori produk
    Route::group([
        'prefix' => 'produk/kategori',
        'as' => 'prod.category.'
    ], function () {
        Route::get('/', 'ProductCategoryController@index')->name('index');
        Route::get('/tambah', 'ProductCategoryController@create')->name('create');
        Route::post('/', 'ProductCategoryController@store')->name('store');
        Route::get('/{id}/ubah', 'ProductCategoryController@edit')->name('edit');
        Route::put('/{id}', 'ProductCategoryController@update')->name('update');
        Route::delete('/{id}', 'ProductCategoryController@destroy')->name('destroy');
    });

    # Route sub kategori produk
    Route::group([
        'prefix' => 'produk/sub-kategori',
        'as' => 'prod.subcategory.'
    ], function () {
        Route::get('/', 'ProductSubCategoryController@index')->name('index');
        Route::get('/tambah', 'ProductSubCategoryController@create')->name('create');
        Route::post('/', 'ProductSubCategoryController@store')->name('store');
        Route::get('/{id}/ubah', 'ProductSubCategoryController@edit')->name('edit');
        Route::put('/{id}', 'ProductSubCategoryController@update')->name('update');
        Route::delete('/{id}', 'ProductSubCategoryController@destroy')->name('destroy');
    });

    # Route jenis produk
    Route::group([
        'prefix' => 'produk/jenis',
        'as' => 'prod.type.'
    ], function () {
        Route::get('/', 'ProductTypeController@index')->name('index');
        Route::get('/tambah', 'ProductTypeController@create')->name('create');
        Route::post('/', 'ProductTypeController@store')->name('store');
        Route::get('/{id}/ubah', 'ProductTypeController@edit')->name('edit');
        Route::put('/{id}', 'ProductTypeController@update')->name('update');
        Route::delete('/{id}', 'ProductTypeController@destroy')->name('destroy');
    });

    # Route sub jenis produk
    Route::group([
        'prefix' => 'produk/sub-jenis',
        'as' => 'prod.subtype.'
    ], function () {
        Route::get('/', 'ProductSubTypeController@index')->name('index');
        Route::get('/tambah', 'ProductSubTypeController@create')->name('create');
        Route::post('/', 'ProductSubTypeController@store')->name('store');
        Route::get('/{id}/ubah', 'ProductSubTypeController@edit')->name('edit');
        Route::put('/{id}', 'ProductSubTypeController@update')->name('update');
        Route::delete('/{id}', 'ProductSubTypeController@destroy')->name('destroy');
    });

    # Route fitur
    Route::group([
        'prefix' => 'fitur',
        'as' => 'features.'
    ], function () {
        Route::get('/', 'FeatureController@index')->name('index');
        Route::get('/tambah', 'FeatureController@create')->name('create');
        Route::post('/', 'FeatureController@store')->name('store');
        Route::get('/{id}/ubah', 'FeatureController@edit')->name('edit');
        Route::get('/{slug}/detail', 'FeatureController@show')->name('show');
        Route::put('/{id}', 'FeatureController@update')->name('update');
        Route::delete('/{id}', 'FeatureController@destroy')->name('destroy');
        Route::get('/icon/{icon}', 'FeatureController@getFeatureIcon')->name('icon');
    });

    # Route kategori fitur
    Route::group([
        'prefix' => 'fitur/kategori',
        'as' => 'feat.category.'
    ], function () {
        Route::get('/', 'FeatureCategoryController@index')->name('index');
        Route::get('/tambah', 'FeatureCategoryController@create')->name('create');
        Route::post('/', 'FeatureCategoryController@store')->name('store');
        Route::get('/{id}/ubah', 'FeatureCategoryController@edit')->name('edit');
        Route::put('/{id}', 'FeatureCategoryController@update')->name('update');
        Route::delete('/{id}', 'FeatureCategoryController@destroy')->name('destroy');
    });
});

Route::get('test', 'ProductSubCategoryController@test');