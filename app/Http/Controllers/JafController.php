<?php

namespace App\Http\Controllers;

use App\Model\JafModel;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\Model\Entities\JafCategory;
use Modules\Admin\Repositories\Model\Entities\JafProduct;

class JafController extends Controller
{
    private $model;
    /**
     * Class constructor.
     */
    public function __construct(JafModel $jafModel)
    {
        $this->model = $jafModel;
    }

    public function index(Request $request)
    {
        $products = $this->model->getAll($request);
        return view('pages.jaf.index', compact('products'));
    }

    public function products(Request $request)
    {
        $products = $this->model->getAll($request);
        $categories = JafCategory::all();
        return view('pages.jaf.product', compact('categories', 'products'));
    }

    public function showProduct($supplier, $product)
    {
        $product = $this->model->findProductBySlug($product);
        return view('pages.jaf.product-show', compact('product'));
    }
}