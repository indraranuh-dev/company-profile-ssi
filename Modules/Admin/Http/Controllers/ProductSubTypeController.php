<?php

namespace Modules\Admin\Http\Controllers;

use App\Utilities\ArrayCheck;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ProductSubTypeRequest;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;
use Modules\Admin\Repositories\ProdSubTypeRepositoryInterface as SubType;

class ProductSubTypeController extends Controller
{
    private $model;

    private $type;

    /**
     * Class constructor.
     */
    public function __construct(
        SubType $prodSubTypeRepositoryInterface,
        Type $prodTypeRepositoryInterface
    ) {
        $this->model = $prodSubTypeRepositoryInterface;
        $this->type = $prodTypeRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $subTypes =  $this->model->getAll();
        return view('admin::produk.subjenis.index', compact('subTypes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $types = $this->type->getAll();
        return view('admin::produk.subjenis.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductSubTypeRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.prod.subtype.index')->with('success', 'Sub jenis berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subType = $this->model->findById($id);
        $types = $this->type->getAll();
        $selects = ArrayCheck::notSelected($types, $subType->types);
        return view('admin::produk.subjenis.edit', compact('subType', 'selects'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ProductSubTypeRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('admin.prod.subtype.index')->with('success', 'Sub jenis berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.prod.subtype.index')->with('success', 'Sub jenis berhasil dihapus.');
    }
}