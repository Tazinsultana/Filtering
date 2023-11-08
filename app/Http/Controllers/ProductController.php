<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        $categories = Category::where('is_active', true)->pluck('title', 'id');
        $products=product::latest()->with(['category'])->get();
        return view('Products.index', compact('categories','products'));
    }

    // For Create.....
    public function Create(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $price = $request->price;
        $description = $request->description;
        $category = category::where('id', $request->category_id)->first();
        $category->products()->create([
            'name' => $name,
            'price' => $price,
            'description' => $description
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }
}
