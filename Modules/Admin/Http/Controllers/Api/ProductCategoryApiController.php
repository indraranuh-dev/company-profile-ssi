<?php

namespace Modules\Admin\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Datatables\ProductCategoryDatatables;
use Modules\Admin\Repositories\ProdCatRepositoryInterface as Category;
use Modules\Admin\Transformers\ProductCategoryResource;

class ProductCategoryApiController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(Category $prodCatRepositoryInterface)
    {
        $this->model = $prodCatRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $category = $this->model->getAll();
        return ProductCategoryDatatables::renderAll($category);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return new ProductCategoryResource($this->model->findById($id));
    }
}