<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        return view('products.index', ['products'=>Product::get()]);
    }
    public function create(){
        return view('products.create');

    }
    public function store(Request $request){
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'image'=> 'required|mimes:jpeg,jpg,png,gif|max:1000' ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;

        $product->save();

        return back();
    }

    public function edit($id){

        $product = Product::where('id',$id)->first();
        return view('products.edit', ['product'=> $product]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'image'=> 'null|mimes:jpeg,jpg,png,gif|max:1000' ]);
            $product = Product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }   
        $product->name = $request->name;
        $product->description = $request->description;
        

        $product->save();

        return back();
    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete(); 
        return back();
    }

}
