<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function category(){
        dd('sss');
        $categories= Category::all();
        $products=Product::latest()->paginate(12);
        // dd('fff');


        return view('Admin.products.products', compact('products','categories'));
    }
   

    public function create(ProductCreateRequest $request){
        $attribute = $request->validated();
        

        if($request->hasFile('image')){
            $extension= $request->image->extension();
            $filename = Str::random(6)."_".time()."_product.".$extension;
            $path = public_path('product_images');
            $request->image->move($path, $filename);
        }
        $attribute['image'] = $filename;    
        
        $product = Product::create($attribute);

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

        public function edit($id){
           
            
            $categories= Category::all();
           
            $product= Product::find($id);
            return view('Admin.products.editproduct',compact('product','categories'));
            
        }
        public function update(Request $request){
            $attribute = $request->all(); 
            
            // $messages = [
            //     'confirmation_mail.email' => ' Confirmation email is required.',
            //     'marketing_notify.email' => 'The marketing email must be a valid email address.',
            //     'reminder.digits' => 'The number must be 10 digits',
            //     'second_call_delay.digits' => 'The second call delay number must be 10 digits',
               
            // ];
    
            $validator = Validator::make($request->all(), [ 
    
               
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'category_id' => 'required',
                'image' => 'nullable',
                'is_favourite' => 'required',
                'status' => 'required',
    
            ], );
    
            if (@$validator->fails()) {
              
               
                return redirect()->back()
                    ->withErrors(@$validator)
                    ->withInput();
            }
             $product=Product::find($request->product_id);
             
             if($request->hasFile('image')){
               
                $extension= $request->image->extension();
                $filename = Str::random(6)."_".time()."_product.".$extension;
                
                $path = public_path('product_images');
                
                $request->image->move($path, $filename);
                
            }
            $attribute['image'] = $filename; 
            
            
         
            $product->update($attribute);
            return redirect()->route('products')->with('message','updated Successfully');
            

            
            
        }



}
