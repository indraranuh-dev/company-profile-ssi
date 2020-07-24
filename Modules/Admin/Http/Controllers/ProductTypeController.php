<?php

namespace Modules\Admin\Http\Controllers;

use App\Utilities\ArrayCheck;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ProductTypeRequest;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;
use Modules\Admin\Repositories\SupplierRepositoryInterface as Supplier;

class ProductTypeController extends Controller
{
    private $model;

    private $supplier;

    public function __construct(
        Type $prodTypeRepositoryInterface,
        Supplier $supplierRepositoryInterface
    ) {
        $this->model = $prodTypeRepositoryInterface;
        $this->supplier = $supplierRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $types = $this->model->getAll();
        return view('admin::produk.jenis.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $suppliers = $this->supplier->getAll('');
        return view('admin::produk.jenis.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductTypeRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.prod.type.index')->with('success', 'Jenis produk berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $type = $this->model->findById($id);
        $suppliers = $this->supplier->getAll('');
        $selects = ArrayCheck::notSelected($suppliers, $type->suppliers);
        return view('admin::produk.jenis.edit', compact('type', 'selects'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ProductTypeRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('admin.prod.type.index')->with('success', 'Jenis produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.prod.type.index')->with('success', 'Jenis produk berhasil dihapus');
    }
}