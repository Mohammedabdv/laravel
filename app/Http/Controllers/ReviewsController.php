<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function reviews(){
        $reviews = Reviews::all();
        return view("Reviews.reviews", compact('reviews'));
    }

    public function storereview(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'subject' => 'required',
        ]);

        $review = new Reviews();
        $review->name = $request->name;
        $review->phone = $request->phone;
        $review->email = $request->email;
        $review->message = $request->message;
        $review->subject = $request->subject;

        $review->save();

        return redirect('/reviews');
    }
}
