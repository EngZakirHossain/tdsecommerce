<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $customers = Auth::guard('customer');
        return view('frontend.pages.customer.dashboard',compact('customers'));
    }
}
