<?php

namespace Modules\Admin\Http\Controllers;

use App\Model\Entities\Counter;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $allVisitors = Counter::count('id');
        $visitorsPerMonth = Counter::whereYear('created_at', now()->year)
            ->whereMonth('created_at', now()->month)->count();
        $visitorsPerDay = Counter::whereDate('created_at', today())->count();
        $visitors = [
            'all' => $allVisitors,
            'perDay' => $visitorsPerDay,
            'perMonth' => $visitorsPerMonth,
        ];
        return view('admin::index', compact('visitors'));
    }
}