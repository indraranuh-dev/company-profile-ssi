<?php

namespace App\Http\Controllers;

use App\Utilities\ArrayCheck;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;
use Modules\Admin\Repositories\ProductRepositoryInterface as Product;
use Modules\Admin\Repositories\FeatureCategoryRepositoryInterface as FeatureCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;
use Modules\Admin\Repositories\SupplierRepositoryInterface as Supplier;

class ProductController extends Controller
{
    private $model;

    private $type;

    private $featureCategory;

    private $supplier;

    /**
     * Constructor
     *
     * @param Product $productRepositoryInterface
     * @param Type $prodTypeRepositoryInterface
     * @param FeatureCategory $featureCategoryRepositoryInterface
     */
    public function __construct(
        Product $productRepositoryInterface,
        Type $prodTypeRepositoryInterface,
        FeatureCategory $featureCategoryRepositoryInterface,
        Supplier $supplierRepositoryInterface
    ) {
        $this->model = $productRepositoryInterface;
        $this->type = $prodTypeRepositoryInterface;
        $this->featureCategory = $featureCategoryRepositoryInterface;
        $this->supplier = $supplierRepositoryInterface;
    }

    /**
     * Get product from resource by passing category, subcategory and supplier
     *
     * @param string $category
     * @param string $subCategory
     * @param string $supplier
     * @param Request $request
     * @return void
     */
    public function getProducts(
        $category,
        $subCategory,
        Request $request
    ) {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);
        $suppliers = $this->supplier->getAll('');
        // return $filters = $this->type->findBySupplier($supplier);
        $products = $this->model->findBySubCategory($subCategory, $request);
        return view('pages.sub-category', compact(
            'productCategories',
            'suppliers',
            'products',
        ));
    }

    /**
     * Get product from resource by passing category, subcategory and supplier
     *
     * @param string $category
     * @param string $subCategory
     * @param string $supplier
     * @param Request $request
     * @return void
     */
    public function getSupplierProducts(
        $category,
        $subCategory,
        $supplier,
        Request $request
    ) {
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

    /**
     * Show prodiuct details from resource by passing category, subcategory and supplier
     *
     * @param string $category
     * @param string $subCategory
     * @param string $supplier
     * @param string $product
     * @param Request $request
     * @return void
     */
    public function showProduct(
        $category,
        $subCategory,
        $supplier,
        $product,
        Request $request
    ) {
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

    /**
     * Get product image from storage
     *
     * @param string $image
     * @return void
     */
    public function getProductImage($image)
    {
        $storage = Storage::disk('image');
        $response = Res::make($storage->get($image), 200);
        $response->header('Content-Type', $storage->mimeType($image));
        return $response;
    }

    /**
     * Get feature icon from storage
     *
     * @param string $icon
     * @return void
     */
    public function getFeatureIcon(string $icon)
    {
        $storage = Storage::disk('icon');
        $response = Res::make($storage->get($icon), 200);
        $response->header('Content-Type', $storage->mimeType($icon));
        return $response;
    }
}