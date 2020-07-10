<?php

namespace Modules\Admin\Http\Controllers\Api;

use App\Utilities\ArrayCheck;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Datatables\ProductSubCategoryDatatables;
use Modules\Admin\Repositories\ProdCatRepositoryInterface;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface as SubCategory;
use Modules\Admin\Transformers\ProductSubCategoryResource;

class ProductSubCategoryApiController extends Controller
{
    private $model;
    private $category;

    public function __construct(
        SubCategory $prodSubCategoryRepositoryInterface,
        ProdCatRepositoryInterface $prodCatRepositoryInterface
    ) {
        $this->model = $prodSubCategoryRepositoryInterface;
        $this->category = $prodCatRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subCategory = $this->model->getAll();
        return ProductSubCategoryDatatables::renderAll($subCategory);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subCategory = $this->model->findById($id);
        $selected = ArrayCheck::notSelected($this->category->getAll(), $subCategory->categories);
        return [
            'data' => new ProductSubCategoryResource($subCategory),
            'category' => $selected
        ];
    }
}