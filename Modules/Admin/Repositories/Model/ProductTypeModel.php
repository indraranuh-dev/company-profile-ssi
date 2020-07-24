<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Contracts\Encryption\DecryptException;
use Modules\Admin\Repositories\Model\Entities\ProductType;
use Modules\Admin\Repositories\ProdTypeRepositoryInterface;

class ProductTypeModel implements ProdTypeRepositoryInterface
{
    public function getAll()
    {
        $types = ProductType::orderBy('created_at', 'desc')->with('suppliers');
        return $types->get();
    }

    public function findById($id)
    {
        $types = ProductType::findOrFail($this->decrypt(false, $id));
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
        $types->save();
        return $this->sync($request);
    }

    public function update($request, $id)
    {
        $types = ProductType::findOrFail($this->decrypt(false, $id));
        $types->name = $request->name;
        $types->slug_name = Str::slug($request->name);
        $types->save();
        return $this->sync($request);
    }

    public function delete($id)
    {
        $types = ProductType::findOrFail($this->decrypt(false, $id));
        return $types->delete();
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
        $type = ProductType::where('name', $request->name)->first();
        return $type->suppliers()->sync($this->decrypt(true, '', $request->supplier));
    }
}