<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    public $table = 'products_subcategories';

    protected $fillable = ['name', 'slug_name'];

    protected $hidden = ['pivot'];

    public function categories()
    {
        return $this->belongsToMany(
            ProductCategory::class,
            'categories_has_subcategories',
            'subcategories_id',
            'categories_id'
        );
    }
}