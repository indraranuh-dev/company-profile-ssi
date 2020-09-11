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
    'as' => 'admin.',
    'middleware' => ['auth', 'verified', 'role:admin', 'x-frame']
], function () {

    Route::get('/', 'AdminController@index')->name('index');

    Route::group([
        'prefix' => 'banner',
        'as' => 'banner.'
    ], function () {
        Route::get('/', 'HeroController@index')->name('index');
        Route::get('/tambah', 'HeroController@create')->name('create');
        Route::get('/image/{image}', 'HeroController@getBannerImage')->name('image');
        Route::post('/', 'HeroController@store')->name('store');
        Route::delete('/{id}', 'HeroController@destroy')->name('destroy');
    });

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
        'prefix' => 'kategori',
        'as' => 'category.'
    ], function () {
        Route::get('/', 'ProductCategoryController@index')->name('index');
        Route::get('/tambah', 'ProductCategoryController@create')->name('create');
        Route::post('/', 'ProductCategoryController@store')->name('store');
        Route::get('/{id}/ubah', 'ProductCategoryController@edit')->name('edit');
        Route::put('/{id}', 'ProductCategoryController@update')->name('update');
        Route::delete('/{id}', 'ProductCategoryController@destroy')->name('destroy');
    });

    # Route sub kategori
    Route::group([
        'prefix' => 'kategori/sub-kategori',
        'as' => 'category.subcategory.'
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

    # Route kategori fitur
    Route::group([
        'prefix' => 'tag',
        'as' => 'tag.'
    ], function () {
        Route::get('/', 'TagController@index')->name('index');
        Route::get('/tambah', 'TagController@create')->name('create');
        Route::post('/', 'TagController@store')->name('store');
        Route::get('/{id}/ubah', 'TagController@edit')->name('edit');
        Route::put('/{id}', 'TagController@update')->name('update');
        Route::delete('/{id}', 'TagController@destroy')->name('destroy');
    });

    # Route General Supplies
    Route::group([
        'prefix' => 'general-supplies',
        'as' => 'gs.'
    ], function () {
        Route::get('/', 'GeneralSuppliesController@index')->name('index');
        Route::get('/tambah', 'GeneralSuppliesController@create')->name('create');
        Route::get('/{slug}/detail', 'GeneralSuppliesController@show')->name('show');
        Route::post('/', 'GeneralSuppliesController@store')->name('store');
        Route::get('/{id}/ubah', 'GeneralSuppliesController@edit')->name('edit');
        Route::put('/{id}', 'GeneralSuppliesController@update')->name('update');
        Route::delete('/{id}', 'GeneralSuppliesController@destroy')->name('destroy');
        Route::get('/{id}/deskripsi/tambah', 'GeneralSuppliesController@createDescription')->name('createDescription');
        Route::get('/{id}/deskripsi', 'GeneralSuppliesController@showDescription')->name('showDescription');
        Route::post('/{id}/deskripsi', 'GeneralSuppliesController@storeDescription')->name('storeDescription');
        Route::put('/{id}/deskripsi', 'GeneralSuppliesController@updateDescription')->name('updateDescription');
        Route::delete('/{id}/deskripsi', 'GeneralSuppliesController@destroyDescription')->name('destroyDescription');
        Route::get('/{id}/gambar/tambah', 'GeneralSuppliesController@createImage')->name('createImage');
        Route::get('/{id}/gambar', 'GeneralSuppliesController@showImage')->name('showImage');
        Route::post('/{id}/gambar', 'GeneralSuppliesController@storeImage')->name('storeImage');
        Route::put('/{id}/gambar', 'GeneralSuppliesController@updateImage')->name('updateImage');
        Route::delete('/{id}/gambar', 'GeneralSuppliesController@destroyImage')->name('destroyImage');
    });

    Route::group([
        'prefix' => 'general-supplies/kategori',
        'as' => 'gs-category.'
    ], function () {
        Route::get('/', 'GeneralSuppliesCategoryController@index')->name('index');
        Route::get('/tambah', 'GeneralSuppliesCategoryController@create')->name('create');
        Route::post('/', 'GeneralSuppliesCategoryController@store')->name('store');
        Route::get('/{id}/ubah', 'GeneralSuppliesCategoryController@edit')->name('edit');
        Route::put('/{id}', 'GeneralSuppliesCategoryController@update')->name('update');
        Route::delete('/{id}', 'GeneralSuppliesCategoryController@destroy')->name('destroy');
    });

    # Route Japan air filter
    Route::group([
        'prefix' => 'japan-air-filter',
        'as' => 'jaf.'
    ], function () {
        Route::get('/', 'JafController@index')->name('index');
        Route::get('/tambah', 'JafController@create')->name('create');
        Route::get('/{slug}/detail', 'JafController@show')->name('show');
        Route::post('/', 'JafController@store')->name('store');
        Route::get('/{id}/ubah', 'JafController@edit')->name('edit');
        Route::put('/{id}', 'JafController@update')->name('update');
        Route::delete('/{id}', 'JafController@destroy')->name('destroy');
        Route::get('/{id}/deskripsi/tambah', 'JafController@createDescription')->name('createDescription');
        Route::get('/{id}/deskripsi', 'JafController@showDescription')->name('showDescription');
        Route::post('/{id}/deskripsi', 'JafController@storeDescription')->name('storeDescription');
        Route::put('/{id}/deskripsi', 'JafController@updateDescription')->name('updateDescription');
        Route::delete('/{id}/deskripsi', 'JafController@destroyDescription')->name('destroyDescription');
    });

    Route::group([
        'prefix' => 'japan-air-filter/kategori',
        'as' => 'jaf-category.'
    ], function () {
        Route::get('/', 'JafCategoryController@index')->name('index');
        Route::get('/tambah', 'JafCategoryController@create')->name('create');
        Route::post('/', 'JafCategoryController@store')->name('store');
        Route::get('/{id}/ubah', 'JafCategoryController@edit')->name('edit');
        Route::put('/{id}', 'JafCategoryController@update')->name('update');
        Route::delete('/{id}', 'JafCategoryController@destroy')->name('destroy');
    });
});