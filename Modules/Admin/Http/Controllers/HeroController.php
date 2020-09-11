<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Response as Res;
use Modules\Admin\Repositories\BannerRepositoryInterface as Banner;

class HeroController extends Controller
{
    private $model;

    /**
     * Class constructor.
     */
    public function __construct(Banner $bannerRepositoryInterface)
    {
        $this->model = $bannerRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $banners = $this->model->getAll();
        return view('admin::hero.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::hero.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(BannerRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.banner.index')
            ->with('success', 'Banner berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.banner.index')
            ->with('success', 'Banner berhasil dihapus.');
    }

    public function getBannerImage($image)
    {
        $storage = Storage::disk('banner');
        $response = Res::make($storage->get($image), 200);
        $response->header('Content-Type', $storage->mimeType($image));
        return $response;
    }
}