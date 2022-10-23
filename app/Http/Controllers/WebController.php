<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WebController extends Controller
{
    public function shop_grid() {
        $products = Product::get_active_products()->paginate(12);
        return view('web.shop_grid',compact('products'));
        //return redirect()->route('login');
    }
    
    public function product_details(Product $product) {

        return view('web.product_details', compact('product'));
        //return redirect()->route('login');
    }

    public function welcome() {
        return view('welcome');
        //return redirect()->route('login');
    }
    
    public function login_register () {
        return view('web.login_register');
        //return redirect()->route('login');
    }
    
    public function contact_us() {
        return view('web.contact_us');
        //return redirect()->route('login');
    }
    
    public function cart() {
        return view('web.cart');
        //return redirect()->route('login');
    }
    public function blog () {
        return view('web.blog');
        //return redirect()->route('login');
    }
    public function blog_details() {
        return view('web.blog_details');
        //return redirect()->route('login');
    }
   public function about_us() {
        return view('web.about_us');
        //return redirect()->route('login');
    }
    
}
