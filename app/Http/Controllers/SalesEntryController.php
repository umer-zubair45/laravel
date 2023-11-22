<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesEntry;
use App\Models\Item;

class SalesEntryController extends Controller
{
    public function create()
    {
        $items = Item::all();
        return view('create', compact('items'));
    }

    public function calculateTotal(Request $request)
    {
        $item = Item::find($request->item_id);

        return response()->json(['price' => $item->price]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_id.*' => 'required|exists:items,id',
            'quantity.*' => 'required|integer|min:1',
            'total_amount.*' => 'required|numeric|min:0',
        ]);

        // Loop through the submitted entries and create SalesEntry records
        foreach ($validatedData['item_id'] as $key => $itemId) {
            SalesEntry::create([
                'item_id' => $itemId,
                'quantity' => $validatedData['quantity'][$key],
                'total_amount' => $validatedData['total_amount'][$key],
            ]);
        }

        return redirect()->route('sales_entries.create')->with('success', 'Sales entries created successfully.');
    }
}
