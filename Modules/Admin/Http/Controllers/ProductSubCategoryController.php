<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ProductSubCategoryRequest;
use Modules\Admin\Repositories\ProdCatRepositoryInterface as Category;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface as SubCategory;

class ProductSubCategoryController extends Controller
{
    private $model;

    private $category;

    /**
     * Class constructor.
     */
    public function __construct(SubCategory $prodSubCategoryRepositoryInterface, Category $prodCatRepositoryInterface)
    {
        $this->model = $prodSubCategoryRepositoryInterface;
        $this->category = $prodCatRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->getAll();
        return view('admin::produk.subkategori.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductSubCategoryRequest $request)
    {
        $this->model->create($request);
        return [
            'message' => 'Sub kategori berhasil ditambahkan'
        ];
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ProductSubCategoryRequest $request, $id)
    {
        $this->model->update($request, $id);
        return [
            'message' => 'Sub kategori berhasil diubah'
        ];
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return [
            'message' => 'Sub kategori berhasil dihapus'
        ];
    }

    public function test()
    {
        return $this->model->getAll();
    }
}