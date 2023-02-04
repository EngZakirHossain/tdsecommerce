<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Upazila;
use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
     public function checkoutPage()
    {
        $carts = Cart::content();
        $total_price = Cart::subtotal();
        $user = Auth::user();
        $districts = District::select('id','name','bn_name')->get();
        return view('frontend.pages.checkout', compact(
            'carts',
            'total_price',
            'districts',
            'user'
        ));
    }
    public function loadUpazillaAjax($district_id)
    {
        $upazilas = Upazila::where('district_id', $district_id)->select('id','name')->get();
        return response()->json($upazilas, 200);
    }

    public function placeOrder(OrderStoreRequest $request)
    {
        dd($request->all());
    }
}
