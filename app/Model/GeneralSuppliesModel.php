<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\GeneralSupplies;
use Modules\Admin\Repositories\Model\Entities\GeneralSuppliesCategory;

class GeneralSuppliesModel extends Model
{
    public function getAll($request)
    {
        $gs = GeneralSupplies::orderBy('created_at', 'desc')->with('category', 'images', 'tags', 'details');
        $category = $this->findCategory($request->c);
        if ($request->c !== '' && $request->c !== 'all') {
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
}