<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Utilities\ArrayCheck;
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
        $subCategories = $this->model->getAll();
        return view('admin::produk.subkategori.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('admin::produk.subkategori.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductSubCategoryRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.prod.subcategory.index')->with('success', 'Sub kategori berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subCategory = $this->model->findById($id);
        $category = $this->category->getAll();
        $selects = ArrayCheck::notSelected($category, $subCategory->categories);
        return view('admin::produk.subkategori.edit', compact('subCategory', 'selects'));
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
        return redirect()->route('admin.prod.subcategory.index')->with('success', 'Sub kategori berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.prod.subcategory.index')->with('success', 'Sub kategori berhasil dihapus.');
    }
}