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
        $types = ProductType::orderBy('created_at', 'desc');
        return $types->get();
    }

    public function findById($id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $types = ProductType::findOrFail($realID);
            return $types;
        } catch (DecryptException $e) {
            return abort(404);
        }
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
        return $types->save();
    }

    public function update($request, $id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $types = ProductType::findOrFail($realID);
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
            $types = ProductType::findOrFail($realID);
            return $types->delete();
        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}