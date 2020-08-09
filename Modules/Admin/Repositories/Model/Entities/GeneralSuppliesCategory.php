<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class GeneralSuppliesCategory extends Model
{
    public $table = 'general_supplies_categories';

    protected $fillable = ['name', 'slug_name'];
}