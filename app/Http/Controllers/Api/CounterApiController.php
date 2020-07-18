<?php

namespace App\Http\Controllers\Api;

use App\Model\CounterModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CounterApiController extends Controller
{
    private $model;

    public function __construct(CounterModel $counterModel)
    {
        $this->model = $counterModel;
    }

    public function index()
    {
        return $this->model->thisYear(now()->year);
    }
}