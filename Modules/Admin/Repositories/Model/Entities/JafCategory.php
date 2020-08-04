<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class JafCategory extends Model
{
    public $table = 'jaf_product_categories';

    protected $fillable = [
        'id', 'name', 'slug_name'
    ];

    protected $hidden = ['pivot'];

    public function jaf()
    {
        return $this->belongsToMany(
            JafProduct::class,
            'jaf_categories',
            'jaf_id',
        );
    }
}