<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class JafProductDetail extends Model
{
    public $table = 'jaf_products_details';

    protected $fillable = [
        'jaf_id', 'description',
    ];

    public function product()
    {
        return $this->belongsTo(JafProduct::class, 'jaf_id', 'id');
    }
}