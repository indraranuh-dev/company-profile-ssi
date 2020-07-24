<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Modules\Admin\Repositories\Model\Entities\ProductSubType;
use Modules\Admin\Repositories\Model\Entities\ProductType;
use Modules\Admin\Repositories\ProdSubTypeRepositoryInterface;

class ProductSubTypeModel implements ProdSubTypeRepositoryInterface
{
    public function getAll()
    {
        $types = ProductSubType::orderBy('created_at', 'desc')->with('types:id,name');
        return $types->get();
    }

    public function findById($id)
    {
        $types = ProductSubType::where('id', $this->decrypt(false, $id))->with('types:id,name');
        return $types->first();
    }

    public function findBySlug($slug)
    {
        $types = ProductSubType::where('slug_name', $slug)->with('types:id,name');
        return $types->first();
    }

    public function create($request)
    {
        $types = new ProductSubType();
        $types->name = $request->name;
        $types->slug_name = Str::slug($request->name);
        $types->save();
        return $this->sync($request);
    }

    public function update($request, $id)
    {
        $types = ProductSubType::findOrFail($this->decrypt(false, $id));
        $types->name = $request->name;
        $types->slug_name = Str::slug($request->name);
        $types->save();
        return $this->sync($request);
    }

    public function delete($id)
    {
        $types = ProductSubType::findOrFail($this->decrypt(false, $id));
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
        $findSub = ProductSubType::where('name', $request->name)->first();
        return $findSub->types()->sync($this->decrypt(true, '', $request->type));
    }
}