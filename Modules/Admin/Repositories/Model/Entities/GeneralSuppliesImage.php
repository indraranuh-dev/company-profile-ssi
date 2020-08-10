<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class GeneralSuppliesImage extends Model
{
    public $table = 'general_supplies_images';

    protected $fillable = ['general_supplies_id', 'image'];

    public function generalSupplies()
    {
        return $this->belongsTo(
            GeneralSupplies::class,
            'general_supplies_id',
            'id',
        );
    }
}