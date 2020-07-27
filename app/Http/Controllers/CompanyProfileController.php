<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response as Res;
use Modules\Admin\Repositories\Model\Entities\ProductCategory;

class CompanyProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);

        return view('welcome', compact(
            'productCategories'
        ));
    }

    public function contactUs()
    {
        $productCategories = ProductCategory::OrderBy('name', 'desc')
            ->with('subCategories.suppliers:name,slug_name')
            ->get(['id', 'name', 'slug_name']);
        return view('pages.contact', compact(
            'productCategories'
        ));
    }
}