<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\JafCategory;
use Modules\Admin\Repositories\Model\Entities\JafProduct;

class JafModel
{
    public function getAll($request)
    {
        $jafs = JafProduct::orderBy('created_at', 'desc')->with('category');

        $category = $this->findCategory($request->c);
        if ($request->c !== '' && !empty($request->c) && $request->c !== 'all' && $category) {
            $jafs->whereHas('category', function (Builder $query) use ($category) {
                $query->where('id', $category->id);
            });
        }
        return $jafs->paginate(9);
    }

    public function findProductBySlug($slug)
    {
        $jaf = JafProduct::where('slug_name', $slug)->with('category', 'tags', 'details');
        return $jaf->limit(1)->get();
    }

    protected function findCategory($slug)
    {
        $category = JafCategory::where('slug_name', $slug);
        return $category->first();
    }
}