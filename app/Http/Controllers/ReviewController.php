<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\Laptop;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $user_id = auth()->id();

        $review = new Review();
        $review->user_id = $user_id;
        $review->laptop_id = $request->input('laptop_id');
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

        return redirect()->back()->with("success", "");
    }

    public function destroy($id)
    {
        Review::find($id)->delete();
        return redirect()->back()->with("success", "");
    }
}


