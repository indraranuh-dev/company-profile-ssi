<?php

namespace Modules\Admin\Http\Controllers;

use App\Utilities\ArrayCheck;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\GeneralSuppliesRequest;
use Modules\Admin\Http\Requests\GSCategoryRequest;
use Modules\Admin\Repositories\GeneralSuppliesRepositoryInterface as GeneralSupplies;
use Modules\Admin\Repositories\GSCategoryRepositoryInterface as Category;
use Modules\Admin\Repositories\TagRepositoryInterface as Tag;
use Modules\Admin\Repositories\SupplierRepositoryInterface as Supplier;

class GeneralSuppliesController extends Controller
{
    private $model;

    private $category;

    private $tag;

    private $supplier;

    /**
     * Class constructor.
     */
    public function __construct(
        GeneralSupplies $generalSuppliesRepositoryInterface,
        Category $gSCategoryRepositoryInterface,
        Supplier $supplierRepositoryInterface,
        Tag $tagRepositoryInterface
    ) {
        $this->model = $generalSuppliesRepositoryInterface;
        $this->category = $gSCategoryRepositoryInterface;
        $this->tag = $tagRepositoryInterface;
        $this->supplier = $supplierRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->model->getAll($request);
        return view('admin::general_supplies.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $suppliers = $this->supplier->findByCategory(['general supplies']);
        $categories = $this->category->getAll();
        $tags = $this->tag->getAll();
        return view('admin::general_supplies.create', compact('categories', 'tags', 'suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createDescription()
    {
        return view('admin::general_supplies.details-create');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function createImage()
    {
        return view('admin::general_supplies.image-create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.gs.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeDescription(Request $request)
    {
        $this->model->createDescription($request);
        return redirect()->route('admin.gs.showDescription', request()->segment(3))
            ->with('success', 'Deskripsi berhasil ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeImage(Request $request)
    {
        $this->model->createProductImage($request);
        return redirect()->route('admin.gs.showImage', request()->segment(3))
            ->with('success', 'Gambar berhasil ditambahkan.');
    }

    /**
     * Show the specified resource.
     * @param int $slug
     * @return Response
     */
    public function show($slug)
    {
        $product = $this->model->findBySlug($slug);
        return view('admin::general_supplies.show', compact('product'));
    }

    /**
     * Show the specified resource.
     * @param int $slug
     * @return Response
     */
    public function showDescription($slug)
    {
        $product = $this->model->findBySlug($slug);
        $details = $product->details;
        return view('admin::general_supplies.details', compact('details'));
    }

    /**
     * Show the specified resource.
     * @param int $slug
     * @return Response
     */
    public function showImage($slug)
    {
        $product = $this->model->findBySlug($slug);
        $images = $product->images;
        return view('admin::general_supplies.image', compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $slug
     * @return Response
     */
    public function edit($slug)
    {
        $product = $this->model->findBySlug($slug);
        $tags = $this->tag->getAll();
        $categories = $this->category->getAll();
        $ST = ArrayCheck::notSelected($tags, $product->tags);
        $SC = ArrayCheck::notSelected($categories, [$product->category]);
        $suppliers = $this->supplier->findByCategory(['general supplies']);
        return view('admin::general_supplies.edit', compact('product', 'ST', 'SC', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $slug
     * @return Response
     */
    public function update(GeneralSuppliesRequest $request, $slug)
    {
        $this->model->update($request, $slug);
        return redirect()->route('admin.gs.index')->with('success', 'Kategori berhasil diubah.');
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
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateImage(Request $request, $id)
    {
        $this->model->updateProductImage($request, $id);
        return redirect()->back()->with('success', 'Gambar berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.gs.index')->with('success', 'Kategori berhasil dihapus.');
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

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroyImage($id)
    {
        $this->model->deleteProductImage($id);
        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}