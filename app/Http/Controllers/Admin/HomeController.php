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

        $balance = 0;
        if (class_exists('App\Models\Order')) {
            $balance = Order::where('status' ,'Delivered')->sum('total_bill');
        }
        return view('home',compact('orders','shop','product','customer','balance'));
    }
}
