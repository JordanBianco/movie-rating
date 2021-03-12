<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movie.index');
    }

    public function show(Movie $movie)
    {
        return view('movie.show', compact('movie'));
    }
}
