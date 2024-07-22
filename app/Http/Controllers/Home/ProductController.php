<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        $categories= Category::all();
        
        return view('Admin.products.products', compact('categories'));
    }

    public function create(ProductCreateRequest $request){
        
        $product = Product::create($request->validated());

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Product created successfully.');
        
        // $attribute=$request->except("_token");
        // $products=Product::create($attribute);
        // return redirect()->back();
        

    }
}
