<?php

namespace Modules\Admin\Http\Controllers;

use App\Utilities\ArrayCheck;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\JafRequest;
use Modules\Admin\Repositories\JafProductRepositoryInterface as Jaf;
use Modules\Admin\Repositories\JafCategoryRepositoryInterface as Category;

class JafController extends Controller
{
    private $model;

    private $category;

    /**
     * Class constructor.
     */
    public function __construct(Jaf $jafProductRepositoryInterface, Category $jafCategoryRepositoryInterface)
    {
        $this->model = $jafProductRepositoryInterface;
        $this->category = $jafCategoryRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $products = $this->model->getAll('');
        return view('admin::jaf.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('admin::jaf.create', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createDescription()
    {
        return view('admin::jaf.details-create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(JafRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.jaf.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeDescription(Request $request)
    {
        $this->model->createDescription($request);
        return redirect()->route('admin.jaf.showDescription', request()->segment(3))->with('success', 'Deskripsi berhasil ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $slug
     * @return Response
     */
    public function show($slug)
    {
        if (request()->ajax()) {
            return $product = $this->model->findBySlug($slug);
        }
    }

    /**
     * Show the specified resource.
     * @param int $slug
     * @return Response
     */
    public function showDescription($id)
    {
        $details = $this->model->findDetailByForeign($id);
        return view('admin::jaf.details', compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->model->findById($id);
        $selects = ArrayCheck::notSelected($this->category->getAll(), $product->category);
        return view('admin::jaf.edit', compact('product', 'selects'));
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
        return redirect()->route('admin.jaf.index')->with('success', 'Produk berhasil diubah.');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateDescription(Request $request, $id)
    {
        $this->model->updateDescription($request, $id);
        return redirect()->back()->with('success', 'Deskripsi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.jaf.index')->with('success', 'Produk berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroyDescription($id)
    {
        $this->model->deleteDescription($id);
        return redirect()->back()->with('success', 'Deskripsi berhasil dihapus.');
    }
}