<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('items.index')->with('success', 'Category created successfully');
    }

    public function destroy(Category $category)
    {
        if ($category->items()->exists()) {
            return redirect()->route('items.index')->with('error', 'Cannot delete category. It is assigned to items.');
        }

        $category->delete();

        return redirect()->route('items.index')->with('success', 'Category deleted successfully');
    }
 
}
