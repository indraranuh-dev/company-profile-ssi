<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Modules\Admin\Repositories\Model\Entities\GeneralSupplies;
use Modules\Admin\Repositories\Model\Entities\JafProduct;
use Modules\Admin\Repositories\Model\Entities\Tag;
use Modules\Admin\Repositories\Model\Entities\Product;

class SearchModel
{

    public function searchProduct($keyword)
    {
        $products = Product::whereRaw('name like "%' . $keyword . '%" OR slug_name like "%' . $keyword . '%"')
            ->with('tags:id,name', 'subCategories:id,slug_name', 'suppliers:id,slug_name');
        $tag = $this->findTag($keyword);
        if ($tag) {
            $products->orWhereHas('tags', function (Builder $query) use ($tag) {
                $query->where('tags_id', $tag->id);
            });
        }
        return $products->limit(5)->get(['id', 'name', 'slug_name']);
    }

    public function searchGS($keyword)
    {
        $gs = GeneralSupplies::whereRaw('name like "%' . $keyword . '%" OR slug_name like "%' . $keyword . '%"')
            ->with('tags:id,name');
        $tag = $this->findTag($keyword);
        if ($tag) {
            $gs->orWhereHas('tags', function (Builder $query) use ($tag) {
                $query->where('tags_id', $tag->id);
            });
        }
        return $gs->limit(5)->get(['id', 'name', 'slug_name']);
    }

    public function searchJaf($keyword)
    {
        $jaf = JafProduct::whereRaw('name like "%' . $keyword . '%" OR slug_name like "%' . $keyword . '%"')
            ->with('tags:id,name');
        $tag = $this->findTag($keyword);
        if ($tag) {
            $jaf->orWhereHas('tags', function (Builder $query) use ($tag) {
                $query->where('tags_id', $tag->id);
            });
        }
        return $jaf->limit(5)->get(['id', 'name', 'slug_name']);
    }

    protected function findTag($k)
    {
        return Tag::whereRaw('slug_name LIKE "%' . $k . '%"')->orWhereRaw('name LIKE "%' . $k . '%"')->first();
    }
}