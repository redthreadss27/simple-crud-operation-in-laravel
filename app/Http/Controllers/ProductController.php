<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::get();

        return view('products.index', ['products'=> $products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
        //validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:10000',
        ]);
        //uploadimage;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
        

        $product = new Product;
        $product->image = $imageName;
        $product->name =$request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product Created');

    }

    public function edit($id){
        // dd($id);
        $product = Product::where('id', $id)->first();
        return view('products/edit', ['product'=>$product]);
    }

    public function update(Request $request, $id){
        // dd($request->all());
        //validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10000',
        ]);
        $product = Product::where('id', $id)->first();
        if(isset($request->image)){
            
            //uploadimage;
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        $product->name =$request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product Updated');
    }

    public function destroy($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted');
    }

    public function show($id){
        $product = Product::where('id', $id)->first();
        
        return view('products.show', ['product' => $product]);
    }


}
