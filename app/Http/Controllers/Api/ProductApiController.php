<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\ProductRepositoryInterface as Product;

class ProductApiController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(Product $productRepositoryInterface)
    {
        $this->model = $productRepositoryInterface;
    }

    public function getProduct(Request $request)
    {
        $products = $this->model->searchProduct($request->k);
        $all = [];
        if ($request->k && !empty($request->k)) {
            foreach ($products as $product) {
                $tags = [];
                foreach ($product->tags as $tag) {
                    (stristr($tag->name, $request->k))
                        ? array_push($tags, $tag->name)
                        : false;
                }
                (array_count_values($tags) !== [])
                    ? $x = ': '
                    : $x = '';
                array_push(
                    $all,
                    $product->name . $x . implode(', ', $tags)
                );
            }
        }
        return response()->json(['data' => $all], 200);
    }
}