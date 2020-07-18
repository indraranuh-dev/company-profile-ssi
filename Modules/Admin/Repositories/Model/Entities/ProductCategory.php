<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $table = 'products_categories';

    protected $fillable = ['name', 'slug_name'];

    protected $hidden = ['pivot'];

    public function subCategories()
    {
        return $this->belongsToMany(
            ProductSubCategory::class,
            'categories_has_subcategories',
            'categories_id',
            'subcategories_id',
        );
    }
}