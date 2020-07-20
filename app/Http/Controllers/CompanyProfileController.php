<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;
use Modules\Admin\Repositories\ProductRepositoryInterface as Product;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;

class CompanyProfileController extends Controller
{
    private $model;

    public function __construct(
        Product $productRepositoryInterface

    ) {
        $this->model = $productRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);

        return view('welcome', compact(
            'productCategories'
        ));
    }

    public function product($subCategory, $supplier, Request $request)
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);
        $products = $this->model->findBySupplierNSubCategory($supplier, $subCategory);
        return view('pages.product', compact(
            'productCategories',
            'products'
        ));
    }

    public function getProductImage($image)
    {
        $storage = Storage::disk('image');
        $response = Res::make($storage->get($image), 200);
        $response->header('Content-Type', $storage->mimeType($image));
        return $response;
    }
}