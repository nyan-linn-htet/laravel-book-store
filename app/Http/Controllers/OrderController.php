<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view()
    {
        $orders = Order::all();

        return view('admin.order-list', ['orders' => $orders]);
    }

    public function deliver($id)
    {
        $order = Order::find($id);
        $order->status = request()->status;
        $order->update();

        return redirect()->back();
    }

    public function login()
    {
        $name = request()->name;
        $password = request()->password;

        if($name == 'nyan' && $password == 12345) {
            session()->put("admin.$name", $password);
            return redirect('/admin');
        } else {
            return redirect('/login')->with('login', 'Incorrect Admin name Or Password! Please type again!');
        }
    }

    public function logout()
    {
        session()->forget('admin');

        return redirect()->back();
    }
}
