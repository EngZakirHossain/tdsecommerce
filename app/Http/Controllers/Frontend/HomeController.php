<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){
        $testimonials = Testimonial::where('is_active',1)->latest('id')->limit(3)
        ->select(['id','client_name','client_designation','client_message','client_image'])
        ->get();

        //product details

        $products = Product::where('is_active',1)
            ->latest('id')
            ->select('id','product_name','slug','product_price', 'product_stock','product_sku', 'product_rating', 'product_thumbnail')
            ->paginate(8);

        return view('frontend.pages.home',compact('testimonials','products'));
    }
}
