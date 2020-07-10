<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Contracts\Encryption\DecryptException;
use Modules\Admin\Repositories\ProdCatRepositoryInterface;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;

class ProductCategoryModel implements ProdCatRepositoryInterface
{
    public function getAll()
    {
        $category = ProductCategory::orderBy('created_at', 'desc');
        return $category->get();
    }

    public function findById($id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $category = ProductCategory::findOrfail($realID);
            return $category;
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function findBySlug($slug)
    {
        $category = ProductCategory::where('slug_name', $slug);
        return $category->first();
    }

    public function create($request)
    {
        $category = new ProductCategory();
        $category->name = $request->name;
        $category->slug_name = Str::slug($request->name);
        return $category->save();
    }

    public function update($request, $id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $category = ProductCategory::findOrFail($realID);
            $category->name = $request->name;
            $category->slug_name = Str::slug($request->name);
            return $category->save();
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function delete($id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $category = ProductCategory::findOrFail($realID);
            return $category->delete();
        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}