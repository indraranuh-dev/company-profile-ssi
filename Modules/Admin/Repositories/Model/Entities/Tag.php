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
}