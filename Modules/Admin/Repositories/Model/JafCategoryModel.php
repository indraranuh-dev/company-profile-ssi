<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Modules\Admin\Repositories\Model\Entities\JafCategory;
use Modules\Admin\Repositories\JafCategoryRepositoryInterface;

class JafCategoryModel implements JafCategoryRepositoryInterface
{
    public function getAll()
    {
        $category = JafCategory::orderBy('created_at', 'desc');
        return $category->get();
    }

    public function findById($id)
    {
        $category = JafCategory::findOrFail($this->decrypt(false, $id));
        return $category;
    }

    public function findBySlug($slug)
    {
        $category = JafCategory::where('slug_name', $slug);
        return $category->first();
    }

    public function create($request)
    {
        $category = new JafCategory();
        $category->name = $request->name;
        $category->slug_name = Str::slug($request->name);
        return $category->save();
    }

    public function update($request, $id)
    {
        $category = JafCategory::findOrFail($this->decrypt(false, $id));
        $category->name = $request->name;
        $category->slug_name = Str::slug($request->name);
        return $category->save();
    }

    public function delete($id)
    {
        $category = JafCategory::findOrFail($this->decrypt(false, $id));
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