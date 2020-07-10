<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/admin', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'supplier',
    'as' => 'supplier.',
    // 'middleware' => ['auth:sanctum']
], function () {
    Route::get('/', 'Api\SupplierApiController@index');
});

Route::group([
    'prefix' => 'produk',
    'as' => 'product.',
    // 'middleware' => ['auth:sanctum']
], function () {

    Route::group([
        'prefix' => 'kategori',
        'as' => 'category.'
    ], function () {
        Route::get('/', 'Api\ProductCategoryApiController@index');
        Route::get('/{id}/edit', 'Api\ProductCategoryApiController@edit');
    });

    Route::group([
        'prefix' => 'sub-kategori',
        'as' => 'sub.category.'
    ], function () {
        Route::get('/', 'Api\ProductSubCategoryApiController@index');
        Route::get('/{id}/edit', 'Api\ProductSubCategoryApiController@edit');
    });
});