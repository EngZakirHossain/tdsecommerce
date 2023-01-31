<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
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

    public function shop(){

         $allProducts = Product::where('is_active',1)
            ->latest('id')
            ->select('id','product_name','slug','product_price', 'product_stock','product_sku', 'product_rating', 'product_thumbnail')
            ->paginate(12);

        $subCategories = SubCategory::where('is_active', 1)
        ->with('products')
        ->latest('id')
        ->limit(5)
        ->select(['id', 'name', 'slug'])
        ->get();

        return view('frontend.pages.shop', compact(
            'allProducts',
            'subCategories'

        ));
    }

    public function productDetails($slug)
    {
        $product = Product::whereSlug($slug)
            ->with('subCategory','productImages')
            ->first();

        $related_products = Product::whereNot('slug', $slug)->select('id', 'product_name', 'slug', 'product_price', 'product_thumbnail')
        ->limit(8)
        ->get();
        return view('frontend.pages.widgets.singleProduct', compact('product', 'related_products'));
    }
}
