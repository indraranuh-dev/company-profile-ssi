<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;
use Modules\Admin\Repositories\ProductRepositoryInterface as Product;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;

class CompanyProfileController extends Controller
{
    private $model;

    private $type;

    public function __construct(
        Product $productRepositoryInterface,
        Type $prodTypeRepositoryInterface
    ) {
        $this->model = $productRepositoryInterface;
        $this->type = $prodTypeRepositoryInterface;
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
        $filters = $this->type->findBySupplier($supplier);
        $products = $this->model->findBySupplierNSubCategory($supplier, $subCategory, $request);
        return view('pages.product', compact(
            'productCategories',
            'products',
            'filters',
        ));
    }

    public function contactUs()
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);
        return view('pages.contact', compact(
            'productCategories'
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