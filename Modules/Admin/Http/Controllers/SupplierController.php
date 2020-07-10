<?php

namespace Modules\Admin\Http\Controllers;

use App\Utilities\Generator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Datatables\SupplierDatatables;
use Modules\Admin\Http\Requests\SupplierAjaxRequest;
use Modules\Admin\Http\Requests\SupplierRequest;
use Modules\Admin\Repositories\SupplierRepositoryInterface as Supplier;

class SupplierController extends Controller
{
    private $model;

    /**
     * Constroctor method
     *
     * @param Supplier $supplierRepositoryInterface
     */
    public function __construct(Supplier $supplierRepositoryInterface)
    {
        $this->model = $supplierRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $suppliers = $this->model->getAll($request->all());
        return view('admin::supplier.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::supplier.create');
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
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $supplier = $this->model->findById($id);
        return view('admin::supplier.edit', compact('supplier'));
        // return [
        //     'encrypted' => $id,
        //     'decrypted' => Generator::crypt($id, 'decrypt')
        // ];
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