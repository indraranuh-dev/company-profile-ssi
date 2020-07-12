<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\ProductTypeRequest;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;

class ProductTypeController extends Controller
{

    private $model;

    public function __construct(Type $prodTypeRepositoryInterface)
    {
        $this->model = $prodTypeRepositoryInterface;
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
        return view('admin::produk.jenis.create');
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
        $type = $this->model->findById($id);
        return view('admin::produk.jenis.edit', compact('type'));
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