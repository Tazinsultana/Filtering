<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $categories = category::latest()->get();

        return view('Category.index', compact('categories'));
    }
    // Create.....
    public function Create(Request $request)

    {
        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|unique:categories',

            ],
            // [
            //     'title.required' => 'Title is requried',
            //     'title.unique' => 'Already Exists'
            // ]
        );

        $title = $request->title;
        $active = $request->is_active == "true" ? true : false;
        // dd($active);
        category::create([
            'title' => $title,
            'is_active' => $active
        ]);

        return response()->json([

            'status' => 'success',

        ]);
    }

    // for delete.....
    public function Delete(Request $request)
    {
        // dd($request->all());
        category::where('id', $request->id)->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }
}
