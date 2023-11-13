<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        $page=0;
        $item=5;
        $categories = Category::where('is_active', true)->pluck('title', 'id');
        $products = product::latest()->with(['category'])->skip($page*$item)->take($item)->get();
        $total_item=Product::count();
        $total_page=(int)ceil($total_item/$item);
        return view('Products.index', compact('categories', 'products','total_page'));
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
            'Price' => $price,
            'description' => $description
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }
    // For DElete.....
    public function Delete(Request $request)
    {
        // dd($request->all());
        product::where('id', $request->product_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    // For Edit.....
    public function Edit(Request $request)
    {
        // // dd($request->all());

        $product = product::where('id', $request->product_id)->first();
        //  dd($product);
        return response()->json([
            'status' => 'success',
            'data' => $product
        ]);
    }

    // For Update.....
    public function Update(Request $request)
    {
        // dd($request->all());
        product::where('id', $request->product_id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    // For Filtering.......
    public function Filtering(Request $request)
    {

        $page=$request->page;
        $item=$request->page_view??5;
// dd($request->all());
        $products = product::where('name', 'like', '%' . $request->filtering . '%')
    //  for  checkbox filtering...

        ->where(function ($q) use ($request) {

            if (isset($request->category) && (count($request->category ?? []))) {
                $q->whereIn('category_id', $request->category);
            }
        })
        // by title filtering...
        // ->orWhereHas('category',function ($q) use ($request) {
        //         $q->where('title','like','%'.$request->filtering.'%');
        //         if ($request->category) {
        //             $q->where('id', $request->category);
        //         }
        //     })
        ->where(function($q) use($request){
            if(isset($request->category) &&(count($request->category ?? []))){
        $q->whereIn('category_id',$request->category);
            }
        })

            ->orderBy('id', 'desc')->with(['category'])->skip($page*$item)->take($item)->get();
            $total_count=product::where('name','like', '%'. $request->filtering . '%')->count();
            $total_page=(int)ceil($total_count/$item);
            // dd($total_page);

            return response()->json([
                'status'=> 'success',
                'data'=> $products,
                'total_page'=>$total_page,
                ]);
    }
}

