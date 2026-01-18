<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Orderdetails;


class OrderController extends Controller
{
    public function storecheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:15',
            'notes' => 'nullable|string|max:1000',
        ]);

        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'user_id' => Auth::user()->id, // Assuming you want to associate the order with the authenticated user_id

        ]);

        Cart::with('product')->each(function ($item) use ($order) {
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        });
        Cart::where('user_id', Auth::user()->id)->delete(); // Clear the cart after order creation

        return redirect('/cart');
    }

    public function index() {
        $order = Order::with('orderdetails')->get();
        return view('history', compact('order'));
    }
}
