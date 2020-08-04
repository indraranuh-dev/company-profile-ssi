<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JafController extends Controller
{
    public function index()
    {
        return view('pages.jaf.index');
    }
}