<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil data untuk dashboard
        $totalOrders   = \App\Models\Order::count();
        $totalSales    = \App\Models\Sale::sum('total');
        $lowStock      = \App\Models\Product::where('stock','<',5)->count();
        $recentOrders  = \App\Models\Order::with('customer')->latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'user',
            'totalOrders',
            'totalSales',
            'lowStock',
            'recentOrders'
        ));
    }
}
