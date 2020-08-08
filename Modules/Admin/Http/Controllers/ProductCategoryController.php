<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ProductCategoryRequest;
use Modules\Admin\Repositories\ProdCatRepositoryInterface as Category;

class ProductCategoryController extends Controller
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
        $categories = $this->model->getAll();
        return view('admin::kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductCategoryRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->model->findById($id);
        return view('admin::kategori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ProductCategoryRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}