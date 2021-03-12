<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class MovieList extends Component
{
    public function render()
    {
        return view('livewire.movie-list', [
            'movies' => Movie::all()
        ]);
    }
}
