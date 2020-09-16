<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GeneralSuppliesModel as GS;
use Modules\Admin\Repositories\GSCategoryRepositoryInterface as Category;
use Modules\Admin\Repositories\SupplierRepositoryInterface as Supplier;

class GeneralSuppliesController extends Controller
{
    private $model;

    private $supplier;

    private $category;

    /**
     * Class constructor.
     */
    public function __construct(
        GS $generalSuppliesModel,
        Supplier $supplierRepositoryInterface,
        Category $gSCategoryRepositoryInterface
    ) {
        $this->model = $generalSuppliesModel;
        $this->category = $gSCategoryRepositoryInterface;
        $this->supplier = $supplierRepositoryInterface;
    }

    public function index(Request $request)
    {
        $products =  $this->model->getAll($request);
        $categories = $this->category->getAll();
        $suppliers = $this->supplier->findByCategory('general supplies');
        return view('pages.gs.index', compact('products', 'categories', 'suppliers'));
    }

    public function showProduct($product)
    {
        $product =  $this->model->findProductBySlug($product);
        return view('pages.gs.product-show', compact('product'));
    }
}