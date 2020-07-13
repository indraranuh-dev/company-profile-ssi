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
        $category = SubCategory::findOrFail($this->decrypt(false, $id));
        $category->name = $request->name;
        $category->slug_name = Str::slug($request->name);
        $category->save();
        return $this->sync($request, $request->name);
    }

    public function delete($id)
    {
        $category = SubCategory::findOrFail($this->decrypt(false, $id));
        return $category->delete();
    }

    protected function decrypt($isArray = false, $id = '', $arr = [])
    {
        if ($isArray === false) {
            return Generator::crypt($id, 'decrypt');
        } else {
            $newArr = [];
            foreach ($arr as $a) {
                array_push($newArr, Generator::crypt($a, 'decrypt'));
            }
            return $newArr;
        }
    }

    protected function sync($request)
    {
        $findSub = SubCategory::where('name', $request->name)->first();
        return $findSub->categories()->sync($this->decrypt(true, '', $request->category));
    }
}