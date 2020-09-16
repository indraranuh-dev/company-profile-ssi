<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\GeneralSupplies;
use Modules\Admin\Repositories\Model\Entities\GeneralSuppliesCategory;
use Modules\Admin\Repositories\Model\Entities\Supplier;

class GeneralSuppliesModel extends Model
{
    public function getAll($request)
    {
        $gs = GeneralSupplies::orderBy('created_at', 'desc')->with('category', 'images', 'tags', 'details');
        $supplier = $this->findSupplier($request->b);
        $category = $this->findCategory($request->c);
        if ($request->b !== '' && !empty($request->b) && $request->b !== 'all' && $supplier) {
            $gs->where('supplier_id', $supplier->id);
        }
        if ($request->c !== '' && !empty($request->c) && $request->c !== 'all' && $category) {
            $gs->whereHas('category', function (Builder $query) use ($category) {
                $query->where('id', $category->id);
            });
        }
        return $gs->paginate(9);
    }

    public function findProductBySlug($slug)
    {
        $gs = GeneralSupplies::where('slug_name', $slug)->with('images', 'category', 'tags', 'details');
        return $gs->limit(1)->get();
    }

    protected function findCategory($slug)
    {
        $category = GeneralSuppliesCategory::where('slug_name', $slug);
        return $category->first();
    }

    protected function findSupplier($slug)
    {
        $supplier = Supplier::where('slug_name', $slug);
        return $supplier->first();
    }
}