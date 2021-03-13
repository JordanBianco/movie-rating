<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $reviews = Movie::join('reviews', 'movies.id', '=', 'reviews.movie_id')
                    ->select('movies.title', 'movies.slug', 'reviews.rating', 'reviews.created_at')
                    ->where('user_id', auth()->user()->id)
                    ->get();

        return view('dashboard', compact('reviews'));
    }
}
