<?php

namespace Modules\Admin\Http\Controllers;

use App\Utilities\ArrayCheck;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\SupplierRequest;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface as SubCategory;
use Modules\Admin\Repositories\SupplierRepositoryInterface as Supplier;

class SupplierController extends Controller
{
    private $model;

    private $subCategory;
    public function __construct(
        Supplier $supplierRepositoryInterface,
        SubCategory $prodSubCategoryRepositoryInterface
    ) {
        $this->model = $supplierRepositoryInterface;
        $this->subCategory = $prodSubCategoryRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $suppliers = $this->model->getAll($request->all());
        return view('admin::supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $subCategories = $this->subCategory->getAll();
        return view('admin::supplier.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(SupplierRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.supplier.index')->with('success', 'Supplier berhasil ditambahkan !');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $supplier = $this->model->findById($id);
        $subCategories = $this->subCategory->getAll();
        $selects = ArrayCheck::notSelected($subCategories, $supplier->subCategories);
        return view('admin::supplier.edit', compact('supplier', 'selects'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('admin.supplier.index')->with('success', 'Supplier berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.supplier.index')->with('success', 'Supplier berhasil dihapus !');
    }
}