<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\Product;
use Modules\Admin\Repositories\Model\Entities\Supplier;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;
use Modules\Admin\Repositories\Model\Entities\ProductSubCategory;
use Modules\Admin\Repositories\ProductRepositoryInterface;

class CompanyProfileController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
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
}