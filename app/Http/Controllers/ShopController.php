<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('shop.index', ['books' => $books]);
    }

    public function relate($id)
    {
        // $books = Book::where('category_id', '=', $id)->get();

        $category = Category::find($id);
        $books = $category->book;

        return view('shop.index', ['books' => $books]);
    }

    public function detail($id)
    {
        $book = Book::find($id);

        return view('shop.book-detail', ['book' => $book]);
    }

    public function add($id)
    {
        $value = session()->get("cart.$id");
        if($value == null) {
            $value = 1;
        } else {
            $value++;
        }
        session()->put("cart.$id", $value);

        return redirect()->back();
    }

    public function remove($id)
    {
        $value = session()->get("cart.$id");
        $value--;

        if($value == 0) {
            session()->forget("cart.$id");
        } else {
            session()->put("cart.$id", $value);
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        session()->forget("cart.$id");

        return redirect()->back();
    }

    public function order()
    {
        $order = new Order();
        $order->name = request()->name;
        $order->email = request()->email;
        $order->phone = request()->phone;
        $order->address = request()->address;
        $order->save();

        foreach(session('cart') as $id => $qty) {
            $item = new Order_item();
            $item->book_id = $id;
            $item->order_id = $order->id;
            $item->quantity = $qty;
            $item->save();
        }

        session()->forget('cart');

        return view('shop.order');
    }
}
