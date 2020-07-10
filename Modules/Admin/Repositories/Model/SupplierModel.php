<?php

namespace Modules\Admin\Repositories\Model;

use Illuminate\Support\Str;
use App\Utilities\Generator;
use Illuminate\Contracts\Encryption\DecryptException;
use Modules\Admin\Repositories\Model\Entities\Supplier;
use Modules\Admin\Repositories\SupplierRepositoryInterface;

class SupplierModel implements SupplierRepositoryInterface
{
    public function getAll($request)
    {
        $supplier = Supplier::orderBy('created_at', 'desc');
        return $supplier->get();
    }

    public function findById(string $id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $supplier = Supplier::findOrFail($realID);
            return $supplier;
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function findBySlug(string $slug)
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
        $supplier->address = $request->address;
        $supplier->email = $request->email;
        ($request->image)
            ? $supplier->image = $request->image
            : false;
        $supplier->phone = $request->phone;
        $supplier->dealer_contact = $request->dealer_contact;
        return $supplier->save();
    }

    public function update($request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->name = $request->name;
        $supplier->slug_name = Str::slug($request->name);
        $supplier->address = $request->address;
        $supplier->email = $request->email;
        ($request->image)
            ? $supplier->image = $request->image
            : false;
        $supplier->phone = $request->phone;
        $supplier->dealer_contact = $request->dealer_contact;
        return $supplier->save();
    }

    public function delete(string $id)
    {
        try {
            $realID = Generator::crypt($id, 'decrypt');
            $supplier = Supplier::findOrFail($realID);
            return $supplier->delete();
        } catch (DecryptException $e) {
            return abort(404);
        }
    }
}