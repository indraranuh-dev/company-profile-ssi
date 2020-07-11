<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Repositories\ProdCatRepositoryInterface as Category;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface as SubCategory;

class ProductController extends Controller
{
    private $category;

    private $subCategory;

    /**
     * Class constructor.
     */
    public function __construct(
        Category $prodCatRepositoryInterface,
        SubCategory $prodSubCategoryRepositoryInterface
    ) {
        $this->category = $prodCatRepositoryInterface;
        $this->subCategory = $prodSubCategoryRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->getAll();
        $subCategories = $this->subCategory->getAll();
        return view('admin::produk.index', compact('categories', 'subCategories'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $subCategories = $this->subCategory->getAll();
        return view('admin::produk.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        dd($request);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}