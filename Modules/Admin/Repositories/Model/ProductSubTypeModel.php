<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Contracts\Encryption\DecryptException;
use Modules\Admin\Repositories\Model\Entities\ProductSubType;
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
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $types = ProductSubType::findOrFail($realID);
            return $types;
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function findBySlug($slug)
    {
        $types = ProductSubType::where('slug_name', $slug);
        return $types->first();
    }

    public function create($request)
    {
        $types = new ProductSubType();
        $types->name = $request->name;
        $types->slug_name = Str::slug($request->name);
        return $types->save();
    }

    public function update($request, $id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $types = ProductSubType::findOrFail($realID);
            $types->name = $request->name;
            $types->slug_name = Str::slug($request->name);
            return $types->save();
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function delete($id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $types = ProductSubType::findOrFail($realID);
            return $types->delete();
        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}