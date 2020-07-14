<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;
use Illuminate\Support\Facades\View;
use Modules\Admin\Http\Requests\FeatureRequest;
use Modules\Admin\Http\Requests\FeatureUpdateRequest;
use Modules\Admin\Repositories\FeatureRepositoryInterface as Feature;
use Modules\Admin\Repositories\FeatureCategoryRepositoryInterface as Category;

class FeatureController extends Controller
{
    private $model;

    private $category;

    /**
     * Class constructor.
     */
    public function __construct(
        Feature $featureRepositoryInterface,
        Category $featureCategoryRepositoryInterface
    ) {
        $this->model = $featureRepositoryInterface;
        $this->category = $featureCategoryRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $features = $this->model->getAll($request);
        return view('admin::fitur.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('admin::fitur.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(FeatureRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.features.index')->with('success', 'Fitur berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $feature = $this->model->findById($id);
        $categories = $this->category->getAll();
        return view('admin::fitur.edit', compact('feature', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(FeatureUpdateRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('admin.features.index')->with('success', 'Fitur berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.features.index')->with('success', 'Fitur berhasil dihapus.');
    }

    /**
     * Get icon from storage
     * @param string $image
     * @return response
     */
    public function getFeatureIcon(string $icon)
    {
        return $result = Storage::disk('icon')->get($icon);
        // $type = Storage::disk('icon')->mimeType($icon);
        // $response = Res::make(View::make('icon', ['result' => $result]), 200);
        // $response->header('Content-Type', $type);
        // return $response;
    }
}