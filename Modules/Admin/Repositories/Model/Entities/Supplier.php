<?php

namespace Modules\Admin\Repositories\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'name', 'slug_name'];

    protected $hidden = [
        'address', 'email', 'image', 'phone', 'dealer_contact'
    ];

    public function products()
    {
        // retur
    }
}