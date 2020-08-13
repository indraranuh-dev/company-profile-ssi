<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Repositories\Model\Entities\Feature;

class FeatureApiController extends Controller
{
    public function show($slug)
    {
        return Feature::where('slug_name', $slug)->first();
    }
}