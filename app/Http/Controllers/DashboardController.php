<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use App\Models\StockMovement;


class DashboardController extends Controller
{
    public function index()
    {

        if (auth()->user()->type === 'admin') {

            $products = Product::count();
            $categories = Category::count();
            $suppliers = Supplier::count();
            $users = User::count();

            $stockIn = StockMovement::where('type', 'in')->sum('quantity');
            $stockOut = StockMovement::where('type', 'out')->sum('quantity');

            $lowStock = Product::whereColumn('quantity', '<=', 'minimum_stock')->count();
            
            $lowStockProducts = Product::whereColumn('quantity', '<=', 'minimum_stock')
                ->orderBy('quantity')
                ->get();

            $recentMovements = StockMovement::with(['product', 'user'])
                ->latest()
                ->take(10)
                ->get();

            return view('dashboard.admin', compact(
                'products',
                'categories',
                'suppliers',
                'users',
                'stockIn',
                'stockOut',
                'lowStock',
                'lowStockProducts',
                'recentMovements'
            ));
        }

        $products = Product::count();

        $stockIn = StockMovement::where('type', 'in')
            ->where('user_id', auth()->id())
            ->sum('quantity');

        $stockOut = StockMovement::where('type', 'out')
            ->where('user_id', auth()->id())
            ->sum('quantity');

        $recentMovements = StockMovement::with('product')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(10)
            ->get();

        return view('dashboard.user', compact(
            'products',
            'stockIn',
            'stockOut',
            'recentMovements'
        ));
    }
}
