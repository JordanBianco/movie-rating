<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function edit(Review $review)
    {
        if (auth()->id() !== $review->author->id) {
            abort(403);
        }

        return view('dashboard.reviews.edit', compact('review'));
    }
}
