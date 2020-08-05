<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\Tag;
use Modules\Admin\Repositories\Model\Entities\Product;

class SearchModel
{

    public function searchProduct($keyword)
    {
        $products = Product::whereRaw('name like "%' . $keyword . '%"');
        $tag = $this->findTag($keyword);
        if ($tag) {
            $products->orWhereHas('tags', function (Builder $query) use ($tag) {
                $query->where('tags_id', $tag->id);
            });
        }
        return $products->with('tags:id,name')->limit(10)->get(['id', 'name', 'slug_name']);
    }

    protected function findTag($k)
    {
        return Tag::whereRaw('slug_name LIKE "%' . $k . '%"')->orWhereRaw('name LIKE "%' . $k . '%"')->first();
    }
}