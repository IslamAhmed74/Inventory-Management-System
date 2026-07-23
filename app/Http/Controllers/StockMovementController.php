<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockMovementRequest;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StockMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movements = StockMovement::with(['product', 'user'])
            ->latest()
            ->paginate(10);

        return view('stock-movements.index', compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('status', '1')
            ->orderBy('name')
            ->get();

        return view('stock-movements.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockMovementRequest  $request)
    {
        DB::beginTransaction();

        try {

            $product = Product::lockForUpdate()->findOrFail($request->product_id);

            // Stock In
            if ($request->type === 'in') {

                $product->increment('quantity', $request->quantity);
            }

            // Stock Out
            else {

                if ($product->quantity < $request->quantity) {

                    DB::rollBack();

                    return back()
                        ->withInput()
                        ->with('error', 'Insufficient stock quantity.');
                }

                $product->decrement('quantity', $request->quantity);
            }

            StockMovement::create([
                'product_id' => $product->id,
                'user_id'    => Auth::id(),
                'type'       => $request->type,
                'quantity'   => $request->quantity,
                'note'       => $request->note,
            ]);

            DB::commit();

            return redirect()
                ->route('stock-movements.index')
                ->with('success', 'Stock movement recorded successfully.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockMovement $stockMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockMovement $stockMovement)
    {
        //
    }
}
