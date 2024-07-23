<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function products(){
        $categories= Category::all();
        $products=Product::latest()->paginate(12);


        return view('Admin.products.products', compact('products','categories'));
    }

    public function create(ProductCreateRequest $request){

        $product = Product::create($request->validated());
        if($request->hasFile('image')){
            $extension= $request->image->extension();
            $filename = Str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs('images',$filename) ;

        }
        $product['image'] = $filename;

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Product created successfully.');
    }
    public function delete($id){
        $product= Product::find(decrypt($id));
        if( !empty($product->image)){
            Storage::delete('images/'.$product->image);
        }
        $product->delete();
        return redirect()->back()->with('message','Deleted Successfully');




}


}
