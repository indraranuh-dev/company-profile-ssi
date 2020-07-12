<?php

namespace Modules\Admin\Repositories\Model;

use Modules\Admin\Repositories\Model\Entities\ProductType;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface;
use Illuminate\Support\Str;

class ProductTypeModel implements ProdTypeRepositoryInterface
{
    public function getAll()
    {
        $types = ProductType::orderBy('created_at', 'desc');
        return $types->get();
    }

    public function findById($id)
    {
        $types = ProductType::findOrFail($id);
        return $types;
    }

    public function findBySlug($slug)
    {
        $types = ProductType::where('slug_name', $slug);
        return $types->first();
    }

    public function create($request)
    {
        $types = new ProductType();
        $types->name = $request->name;
        $types->slug_name = Str::slug($request->name);
        return $types->save();
    }

    public function update($request, $id)
    {
        $types = ProductType::findOrFail($id);
        $types->name = $request->name;
        $types->slug_name = Str::slug($request->name);
        return $types->save();
    }

    public function delete($id)
    {
        $types = ProductType::findOrFail($id);
        return $types->delete();
    }
}