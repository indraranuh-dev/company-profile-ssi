<?php

namespace Modules\Admin\Http\Controllers;

use App\Utilities\ArrayCheck;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Response as res;
use Modules\Admin\Http\Requests\ProductUpdateRequest;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface as Type;
use Modules\Admin\Repositories\FeatureRepositoryInterface as Feature;
use Modules\Admin\Repositories\ProductRepositoryInterface as Product;
use Modules\Admin\Repositories\ProdCatRepositoryInterface as Category;
use Modules\Admin\Repositories\SupplierRepositoryInterface as Supplier;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface as SubCategory;
use Modules\Admin\Repositories\FeatureCategoryRepositoryInterface as FeatureCategory;
use Modules\Admin\Repositories\TagRepositoryInterface as Tag;

class ProductController extends Controller
{
    private $model;

    private $category;

    private $subCategory;

    private $feature;

    private $featureCategory;

    private $supplier;

    private $type;

    private $tag;

    /**
     * Class constructor.
     */
    public function __construct(
        Product $productRepositoryInterface,
        Category $prodCatRepositoryInterface,
        SubCategory $prodSubCategoryRepositoryInterface,
        Feature $featureRepositoryInterface,
        FeatureCategory $featureCategoryRepositoryInterface,
        Supplier $supplierRepositoryInterface,
        Type $prodTypeRepositoryInterface,
        Tag $tagRepositoryInterface
    ) {
        $this->model = $productRepositoryInterface;
        $this->category = $prodCatRepositoryInterface;
        $this->subCategory = $prodSubCategoryRepositoryInterface;
        $this->feature = $featureRepositoryInterface;
        $this->featureCategory = $featureCategoryRepositoryInterface;
        $this->supplier = $supplierRepositoryInterface;
        $this->type = $prodTypeRepositoryInterface;
        $this->tag = $tagRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->category->getAll();
        $subCategories = $this->subCategory->getAll();
        $products = $this->model->getAll($request);
        return view('admin::produk.index', compact(
            'categories',
            'subCategories',
            'products'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $subCategories = $this->subCategory->getAll();
        $features = $this->feature->getOnly('');
        $featureCategories = $this->featureCategory->getAll();
        $types = $this->type->getAll();
        $suppliers = $this->supplier->getAll($request);
        $tags = $this->tag->getAll();
        return view('admin::produk.create', compact(
            'subCategories',
            'features',
            'types',
            'suppliers',
            'featureCategories',
            'tags'
        ));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show(Request $request, $slug)
    {
        $product = $this->model->adminFindBySlug($slug);
        $featureCategories = $this->featureCategory->getAll();
        return view('admin::produk.show', compact(
            'product',
            'featureCategories'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $product = $this->model->findById($id);
        $subCategories = $this->subCategory->getAll();
        $features = $this->feature->getOnly(['id', 'name']);
        $featureCategories = $this->featureCategory->getAll();
        $types = $this->type->getAll();
        $suppliers = $this->supplier->getAll($request);
        $tags = $this->tag->getAll();
        $selects =  ArrayCheck::notSelected($features, $product->features);
        $selectTags =  ArrayCheck::notSelected($tags, $product->tags);
        return view('admin::produk.edit', compact(
            'product',
            'subCategories',
            'features',
            'types',
            'suppliers',
            'featureCategories',
            'selects',
            'selectTags'
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.product.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    public function getProductImage($image)
    {
        $storage = Storage::disk('image');
        $response = Res::make($storage->get($image), 200);
        $response->header('Content-Type', $storage->mimeType($image));
        return $response;
    }
}