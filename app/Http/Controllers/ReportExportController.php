<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockMovement;

class ReportExportController extends Controller
{


    public function index(Request $request)
    {
        $query = StockMovement::with(['product', 'user']);

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $query = StockMovement::with(['product', 'user']);

        if (request('product_id')) {
            $query->where('product_id', request('product_id'));
        }

        if (request('type')) {
            $query->where('type', request('type'));
        }

        if (request('from_date')) {
            $query->whereDate('created_at', '>=', request('from_date'));
        }

        if (request('to_date')) {
            $query->whereDate('created_at', '<=', request('to_date'));
        }

        $movements = $query->latest()->get();

        $products = Product::orderBy('name')->get();

        return view('reports.index', compact('movements', 'products'));
    }
    public function pdf()
    {
        $movements = StockMovement::with([
            'product',
            'user'
        ])
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'reports.pdf',
            compact('movements')
        );

        return $pdf->download('Stock_Report.pdf');
    }
}
