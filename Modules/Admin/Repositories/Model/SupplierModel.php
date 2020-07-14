<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Modules\Admin\Repositories\Model\Entities\Supplier;
use Modules\Admin\Repositories\SupplierRepositoryInterface;

class SupplierModel implements SupplierRepositoryInterface
{
    public function getAll($request)
    {
        $supplier = Supplier::orderBy('created_at', 'desc');
        return $supplier->get();
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

    public function create($request)
    {
        $supplier = new Supplier();
        $supplier->id = Generator::shortUUID();
        $supplier->name = $request->name;
        $supplier->slug_name = Str::slug($request->name);
        return $supplier->save();
    }

    public function update($request, $id)
    {
        $supplier = Supplier::findOrFail($this->decrypt(false, $id));
        $supplier->name = $request->name;
        $supplier->slug_name = Str::slug($request->name);
        return $supplier->save();
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
}