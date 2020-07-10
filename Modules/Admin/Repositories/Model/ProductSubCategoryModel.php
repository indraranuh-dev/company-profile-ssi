<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Contracts\Encryption\DecryptException;
use Modules\Admin\Repositories\Model\Entities\ProductSubCategory as SubCategory;
use Modules\Admin\Repositories\ProdSubCategoryRepositoryInterface;

class ProductSubCategoryModel implements ProdSubCategoryRepositoryInterface
{
    public function getAll()
    {
        $category = SubCategory::orderBy('created_at', 'desc')->with('categories:id,name');
        return $category->get();
    }

    public function findById($id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $category = SubCategory::findOrfail($realID);
            return $category;
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function findBySlug($slug)
    {
        $category = SubCategory::where('slug_name', $slug);
        return $category->first();
    }

    public function create($request)
    {
        $category = new SubCategory();
        $category->name = $request->name;
        $category->slug_name = Str::slug($request->name);
        $category->save();
        return $this->sync($request, $request->name);
    }

    public function update($request, $id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $category = SubCategory::findOrFail($realID);
            $category->name = $request->name;
            $category->slug_name = Str::slug($request->name);
            $category->save();
            return $this->sync($request, $request->name);
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function delete($id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $category = SubCategory::findOrFail($realID);
            return $category->delete();
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    protected function sync($request, $name)
    {
        $category = SubCategory::where('name', $name)->first();
        return $category->categories()->sync($request->category);
    }
}