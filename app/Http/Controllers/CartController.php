<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        //  // Fetch products for the authenticated user
        $cart = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        $total = $cart->sum(fn($item) => $item->product->price * $item->quantity);
        return view('Cart.cart', compact('cart' , 'total'));
    }

    public function Addproducttocart($productid)
    {

        $result = Cart::where('user_id', Auth::user()->id)->where('product_id', $productid)->first(); // Remove existing cart item if it exists
        if ($result) {
            $result->quantity += 1;
            $result->save(); // Increment quantity if the product is already in the cart
        } else {
            $cart = new Cart();
            $cart->product_id = $productid;
            $cart->user_id = Auth::user()->id;
            $cart->quantity = 1; // Default quantity can be set to 1 or as per your requirement
            $cart->save();
        }
        // Assuming you want to fetch categories for the product view
        return redirect('/'); // Redirect to the product index or any other page you prefer
    }
    public function deletecart($cartid)
    {
        Cart::find($cartid)->delete(); // Delete the cart item by its ID
        return redirect('/cart');
    }

    public function checkout()
    {
        $cart = Cart::with('product')->where('user_id', Auth::user()->id)->get();
        $total = $cart->sum(fn($item) => $item->product->price * $item->quantity);
        return view('/Cart.checkout' , compact('cart', 'total')); 
    }

    
}
