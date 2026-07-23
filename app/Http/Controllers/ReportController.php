<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $query = StockMovement::with(['product', 'user']);

        // Product Filter
        if ($request->filled('product')) {
            $query->where('product_id', $request->product);
        }

        // User Filter
        if ($request->filled('user')) {
            $query->where('user_id', $request->user);
        }

        // Type Filter
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Date From
        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        // Date To
        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        $movements = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $products = Product::orderBy('name')->get();

        $users = User::orderBy('name')->get();

        $totalIn = (clone $query)
            ->where('type', 'in')
            ->sum('quantity');

        $totalOut = (clone $query)
            ->where('type', 'out')
            ->sum('quantity');

        return view('reports.index', compact(
            'movements',
            'products',
            'users',
            'totalIn',
            'totalOut'
        ));
    }
}
