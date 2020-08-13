<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;
use Modules\Admin\Repositories\Model\Entities\Supplier;
use Modules\Admin\Repositories\SupplierRepositoryInterface;

class SupplierModel implements SupplierRepositoryInterface
{
    public function getAll($request)
    {
        $supplier = Supplier::orderBy('created_at', 'desc')->with('subCategories:id,name');
        return $supplier->get();
    }

    public function getWhere($array)
    {
        if (count($array) === 2) {
            $supplier = Supplier::where($array[0], $array[1])->with('subCategories:id,name');
            return $supplier->get();
        } elseif (count($array) === 3) {
            $supplier = Supplier::where($array[0], $array[1], $array[2])->with('subCategories:id,name');
            return $supplier->get();
        }
        return [];
    }

    public function findById($id)
    {
        $supplier = Supplier::findOrFail($this->decrypt(false, $id));
        return $supplier;
    }

    public function findBySlug($slug)
    {
        $supplier = Supplier::where('slug_name', $slug);
        return $supplier->first();
    }

    public function findByCategory($categoryName)
    {
        $supplier = Supplier::orderBy('name', 'asc');
        $category = $this->findCategory($categoryName);
        if ($categoryName !== null && $categoryName !== '') {
            $supplier->whereHas('categories', function (Builder $query) use ($category) {
                $query->where('id', $category->id);
            });
        }
        return $supplier->get(['id', 'name']);
    }

    public function create($request)
    {
        $supplier = new Supplier();
        $supplier->id = Generator::shortUUID();
        $supplier->name = $request->name;
        $supplier->slug_name = Str::slug($request->name);
        $supplier->save();
        return $this->sync($request);
    }

    public function update($request, $id)
    {
        $supplier = Supplier::findOrFail($this->decrypt(false, $id));
        $supplier->name = $request->name;
        $supplier->slug_name = Str::slug($request->name);
        $supplier->save();
        return $this->sync($request);
    }

    public function delete($id)
    {
        $supplier = Supplier::findOrFail($this->decrypt(false, $id));
        return $supplier->delete();
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
        $find = Supplier::where('name', $request->name)->first();
        $find->categories()->sync($this->decrypt(false, $request->category));
        if ($request->subCategory) {
            return $find->subCategories()->sync($this->decrypt(true, '', $request->subCategory));
        }
    }

    protected function findCategory($name)
    {
        $category =  ProductCategory::where('name', $name);
        return $category->first();
    }
}