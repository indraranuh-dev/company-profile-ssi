<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['name', 'slug_name'];

    protected $hidden = ['pivot'];

    public function subTypes()
    {
        return $this->belongsToMany(ProductSubType::class, 'types_has_subtypes', 'types_id', 'subtypes_id');
    }
}