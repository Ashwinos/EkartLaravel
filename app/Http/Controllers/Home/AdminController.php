<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(){
        return view('Admin.login');
    }
    public function doLogin(Request $request){
       $attributes = $request->except('_token');
       if(auth()->guard('admin')->attempt($attributes)){
        return redirect()->route('dashboard');
        
       }
       else{
        return "not success";
       }
       

        

        dd('test');
    }
}
