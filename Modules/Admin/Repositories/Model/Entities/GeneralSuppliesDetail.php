<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class GeneralSuppliesDetail extends Model
{
    public $table = 'general_supplies_details';

    protected $fillable = ['general_supplies_id', 'description'];

    public function generalSupplies()
    {
        return $this->belongsTo(
            GeneralSupplies::class,
            'general_supplies_id',
            'id'
        );
    }
}