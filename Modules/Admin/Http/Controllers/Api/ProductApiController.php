<?php

namespace Modules\Admin\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Datatables\ProductDatatables;
use Modules\Admin\Repositories\ProductRepositoryInterface;

class ProductApiController extends Controller
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
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->model->getAll($request);
        return ProductDatatables::renderAll($products);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }
}