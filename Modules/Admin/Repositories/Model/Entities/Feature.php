<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name', 'slug_name', 'icon', 'desccription', 'feature_category_id'];

    protected $hidden = ['pivot'];

    public function category()
    {
        return $this->belongsTo(FeatureCategory::class, 'feature_category_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_has_features', 'features_id', 'products_id');
    }
}