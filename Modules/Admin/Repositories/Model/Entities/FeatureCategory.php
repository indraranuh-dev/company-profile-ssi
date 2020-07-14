<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class FeatureCategory extends Model
{
    protected $fillable = ['name', 'slug_name'];
}