<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $fillable = [
        'id', 'name', 'slug_name', 'product_image', 'description', 'spesification'
    ];

    public function subCategories()
    {
        return $this->belongsToMany(ProductSubCategory::class, 'products_id', 'subcategories_id');
    }
}