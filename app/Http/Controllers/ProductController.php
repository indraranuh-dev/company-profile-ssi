<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;
use Modules\Admin\Repositories\ProductRepositoryInterface as Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;

class ProductController extends Controller
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


    public function getProductImage($image)
    {
        $storage = Storage::disk('image');
        $response = Res::make($storage->get($image), 200);
        $response->header('Content-Type', $storage->mimeType($image));
        return $response;
    }
}