<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class GeneralSupplies extends Model
{
    public $incrementing = false;

    public $table = 'general_supplies';

    protected $fillable = ['id', 'name', 'slug_name', 'series', 'gs_category_id'];

    public function category()
    {
        return $this->belongsTo(
            GeneralSuppliesCategory::class,
            'gs_category_id',
            'id',
        );
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'general_supplies_has_tags',
            'general_supplies_id',
            'tags_id',
        );
    }

    public function images()
    {
        return $this->hasMany(
            GeneralSuppliesImage::class,
            'general_supplies_id',
            'id'
        );
    }

    public function details()
    {
        return $this->hasMany(
            GeneralSuppliesDetail::class,
            'general_supplies_id',
            'id'
        );
    }
}