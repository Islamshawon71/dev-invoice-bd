<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;

class HomeController
{
    public function index()
    {

        $orders = Order::all()->count();
        $shop = Shop::all()->count();
        $product = Product::all()->count();
        $customer = Customer::all()->count();

        return view('home',compact('orders','shop','product','customer'));
    }
}
