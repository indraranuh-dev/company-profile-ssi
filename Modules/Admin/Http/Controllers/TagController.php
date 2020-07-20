<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\TagRequest;
use Modules\Admin\Repositories\TagRepositoryInterface as Tag;

class TagController extends Controller
{
    private $model;

    /**
     * Class constroctor
     *
     * @param Tag $tagRepositoryInterface
     */
    public function __construct(Tag $tagRepositoryInterface)
    {
        $this->model = $tagRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $tags = $this->model->getAll();
        return view('admin::tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::tag.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(TagRequest $request)
    {
        $this->model->create($request);
        return redirect()->route('admin.tag.index')->with('success', 'Tag berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $tag = $this->model->findById($id);
        return view('admin::tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(TagRequest $request, $id)
    {
        $this->model->update($request, $id);
        return redirect()->route('admin.tag.index')->with('success', 'Tag berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return redirect()->route('admin.tag.index')->with('success', 'Tag berhasil dihapus');
    }
}