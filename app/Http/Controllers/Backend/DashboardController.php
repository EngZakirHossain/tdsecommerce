<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $total_earning = Order::sum('total');
        $total_order_count = Order::count();
        $total_categories = Category::count();
        $total_products = Product::count();
        $total_customers = User::where('role_id', 2)->count();
        $orders = Order::with(['billing', 'orderdetails'])->latest('id')->limit(8)->get();
        $this_month_order = Order::whereMonth('created_at', '=', Carbon::now()->month)->count();
        $this_month_revenue = Order::whereMonth('created_at', '=', Carbon::now()->month)->sum('total');


        $order_on_2022 = Order::whereBetween('created_at', ['2022-01-01', '2022-12-31'])->count();
        $order_on_2023 = Order::whereBetween('created_at', ['2023-01-01', '2023-12-31'])->count();
        $order_on_2024 = Order::whereBetween('created_at', ['2024-01-01', '2024-12-31'])->count();
        $order_on_2025 = Order::whereBetween('created_at', ['2025-01-01', '2025-12-31'])->count();

        $order_yearwise = array($order_on_2022, $order_on_2023, $order_on_2024,$order_on_2025);
        return view('backend.pages.dashboard',compact(
            'total_earning',
            'total_order_count',
            'total_categories',
            'total_products',
            'total_customers',
            'orders',
            'order_yearwise',
            'this_month_order',
            'this_month_revenue',
        ));
    }
}
