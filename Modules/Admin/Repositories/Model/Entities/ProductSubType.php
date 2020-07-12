<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductSubType extends Model
{
    public $table = 'product_subtypes';

    protected $hidden = ['pivot'];

    protected $fillable = ['name', 'slug_name'];

    public function types()
    {
        return $this->belongsToMany(ProductType::class, 'types_has_subtypes', 'subtypes_id', 'types_id');
    }
}