<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category; 
use App\Models\Supplier; 
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $items = $query->with(['category', 'supplier'])->paginate(10);

        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('items.index', compact('items', 'categories', 'suppliers'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('items.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        Item::create($request->all());
        return redirect()->route('items.index');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all(); 
        $suppliers = Supplier::all();  
        return view('items.edit', compact('item', 'categories', 'suppliers'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id', 
            'supplier_id' => 'required|exists:suppliers,id',   
        ]);

        $item->update($request->all());
        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
