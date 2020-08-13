<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GeneralSuppliesModel as GS;
use Modules\Admin\Repositories\GSCategoryRepositoryInterface as Category;

class GeneralSuppliesController extends Controller
{
    private $model;

    private $category;

    /**
     * Class constructor.
     */
    public function __construct(
        GS $generalSuppliesModel,
        Category $gSCategoryRepositoryInterface
    ) {
        $this->model = $generalSuppliesModel;
        $this->category = $gSCategoryRepositoryInterface;
    }

    public function index(Request $request)
    {
        $products =  $this->model->getAll($request);
        $categories = $this->category->getAll();
        return view('pages.gs.index', compact('products', 'categories'));
    }

    public function showProduct($product)
    {
        $product =  $this->model->findProductBySlug($product);
        return view('pages.gs.product-show', compact('product'));
    }
}