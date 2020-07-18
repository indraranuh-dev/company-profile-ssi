<?php

namespace App\Model\Entities;

use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $fillable = ['status', 'pages'];
}