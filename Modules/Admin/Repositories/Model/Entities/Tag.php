<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'product_tags';

    protected $fillable = ['name', 'slug_name'];

    protected $hidden = ['pivot'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'products_has_tags',
            'tags_id',
            'products_id'
        );
    }

    public function jafs()
    {
        return $this->belongsToMany(
            JafProduct::class,
            'jaf_has_tags',
            'tags_id',
            'jafs_id',
        );
    }

    public function generalSupplies()
    {
        return $this->belongsToMany(
            GeneralSupplies::class,
            'general_supplies_has_tags',
            'tags_id',
            'general_supplies_id',
        );
    }
}