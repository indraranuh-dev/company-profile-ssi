<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    protected $hidden = ['pivot'];

    protected $fillable = [
        'id', 'name', 'slug_name', 'product_image', 'description', 'series', 'spesification'
    ];

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }

    public function subCategories()
    {
        return $this->belongsToMany(
            ProductSubCategory::class,
            'products_has_subcategories',
            'products_id',
            'subcategories_id'
        );
    }

    public function features()
    {
        return $this->belongsToMany(
            Feature::class,
            'products_has_features',
            'products_id',
            'features_id'
        );
    }

    public function suppliers()
    {
        return $this->belongsToMany(
            Supplier::class,
            'suppliers_has_products',
            'products_id',
            'suppliers_id',
        );
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'products_has_tags',
            'products_id',
            'tags_id'
        );
    }
}