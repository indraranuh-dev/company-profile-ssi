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

    public function getWhere($array)
    {
        if (is_array($array)) {
            if (count($array) === 2) {
                $category = ProductCategory::orderBy('created_at', 'desc')->where($array[0], $array[1]);
                return $category->get();
            } elseif (count($array) === 3) {
                $category = ProductCategory::orderBy('created_at', 'desc')->where($array[0], $array[1], $array[2]);
                return $category->get();
            }
            return [];
        }
        return [];
    }

    public function findById($id)
    {
        $category = ProductCategory::findOrfail($this->decrypt(false, $id));
        return $category;
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
        $category = ProductCategory::findOrFail($this->decrypt(false, $id));
        $category->name = $request->name;
        $category->slug_name = Str::slug($request->name);
        return $category->save();
    }

    public function delete($id)
    {
        $category = ProductCategory::findOrFail($this->decrypt(false, $id));
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
}