<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'name', 'slug_name'];

    protected $hidden = [
        'address', 'email', 'image', 'phone', 'dealer_contact', 'pivot'
    ];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'suppliers_has_products',
            'suppliers_id',
            'products_id'
        );
    }

    public function subCategories()
    {
        return $this->belongsToMany(
            ProductSubCategory::class,
            'suppliers_has_subcategories',
            'suppliers_id',
            'subcategories_id'
        );
    }
}