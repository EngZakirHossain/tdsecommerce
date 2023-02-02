<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartPage()
    {
        $cartItems = Cart::content();
        $subTotal = Cart::subtotal();
        return view('frontend.pages.shopping-cart',compact('cartItems','subTotal'));
    }
    public function addToCart(Request $request)
    {
        $product_slug = $request->product_slug;
        $order_qty = $request->order_qty;

        $product = Product::whereSlug($product_slug)->first();
        Cart::add([
            'id'=>$product->id,
            'name'=>$product->product_name,
            'price'=>$product->product_price,
            'qty'=>$order_qty,
            'weight'=>0,
            'options'=>[
                'product_thumbnail'=>$product->product_thumbnail,
            ]
        ]);

        Toastr::success('Product Added into Cart');
        return back();

    }
}
