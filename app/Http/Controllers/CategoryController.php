<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index(){
        $categories=category::latest()->get();

        return view('Category.index',compact('categories'));
    }
// Create.....
    public function Create(Request $request){

// dd($request->all());

$title=$request->title;
$active=$request->is_active =="true" ? true:false;
// dd($active);
$category=category::create([
    'title'=> $title,
    'is_active'=> $active
]);
dd($category);
return response()->json([

    'status'=> 'success',
    'data'=>$category
]);


}
}
