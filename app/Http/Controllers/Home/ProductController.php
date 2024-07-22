<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        
        return view('Admin.products.products');
    }

    public function create(Request $request){
        $attribute=$request->except("_token");
        $products=Product::create($attribute);
        return redirect()->back();
        

    }
}
