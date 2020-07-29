<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;
use Modules\Admin\Repositories\ProductRepositoryInterface as Product;
use Modules\Admin\Repositories\FeatureCategoryRepositoryInterface as FeatureCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;

class ProductController extends Controller
{
    private $model;

    private $type;

    private $featureCategory;

    public function __construct(
        Product $productRepositoryInterface,
        Type $prodTypeRepositoryInterface,
        FeatureCategory $featureCategoryRepositoryInterface
    ) {
        $this->model = $productRepositoryInterface;
        $this->type = $prodTypeRepositoryInterface;
        $this->featureCategory = $featureCategoryRepositoryInterface;
    }

    public function product($category, $subCategory, $supplier, Request $request)
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

    public function showProduct($category, $subCategory, $supplier, $product, Request $request)
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);
        $products = $this->model->findBySlug($product);
        $featureCategories = $this->featureCategory->getAll();

        return view('pages.product-show', compact(
            'productCategories',
            'products',
            'featureCategories',
        ));
    }


    public function getProductImage($image)
    {
        $storage = Storage::disk('image');
        $response = Res::make($storage->get($image), 200);
        $response->header('Content-Type', $storage->mimeType($image));
        return $response;
    }

    public function getFeatureIcon(string $icon)
    {
        return $result = Storage::disk('icon')->get($icon);
    }
}