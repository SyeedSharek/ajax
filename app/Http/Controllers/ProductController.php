<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::latest()->paginate(5);

        return view('product', compact('products'));
    }

    public function create()
    {
        return view('product_modal');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|string',
                'price' => 'required|numeric',
            ],
            [
                'name.required' => 'Name is required',
                'price.required' => 'Price Is required',

            ]
        );
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;

        $product->save();

        return response()->json([
            'status' => 'success',
            // 'message' => 'Product created successfully'
        ]);
    }


    public function update(Request $request)
    {

        // dd($request->all());
        $request->validate(
            [
                'name' => 'required|string',
                'price' => 'required|numeric',
            ],
            [
                'name.required' => 'Name is required',
                'price.required' => 'Price Is required',

            ]
        );

        Product::where('id',$request->up_id)->update([
            'name' => $request->name,
            'price' => $request->price,

        ]);

        return response()->json([
            'status' => 'success',
            // 'message' => 'Product created successfully'
        ]);
    }

    public function delete(Request $request){
        Product::find($request->product_id)->delete();

        return response()->json([
            'status' => 'success',
            // 'message' => 'Product created successfully'
        ]);
    }

    public function pagination(Request $request){

        $products = Product::latest()->paginate(5);

        return view('paginations_product', compact('products'))->render();

    }

    public function search(Request $request){

        $products = Product::where('name','like','%'.$request->search_product.'%')
        ->orwhere('price','like','%'.$request->search_product.'%')
        ->orderBy('id','desc')
        ->paginate(5);

        if($products->count()>=1){

        return view('paginations_product', compact('products'))->render();

        }

        else{
            return response()->json([
                'status'=>'Nothing Found',

            ]);
        }

    }
}
