<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class JafProduct extends Model
{
    public $incrementing = false;

    public $table = 'jaf_products';

    protected $fillable = [
        'id', 'name', 'slug_name', 'series', 'image',
    ];

    protected $hidden = ['pivot'];

    public function category()
    {
        return $this->belongsToMany(
            JafCategory::class,
            'jaf_has_categories',
            'jaf_id',
            'jaf_categories',
        );
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'jaf_has_tags',
            'jafs_id',
            'tags_id',
        );
    }

    public function details()
    {
        return $this->hasMany(
            JafProductDetail::class,
            'jaf_id',
            'id'
        );
    }
}