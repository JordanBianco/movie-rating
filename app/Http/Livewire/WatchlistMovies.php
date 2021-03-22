<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WatchlistMovies extends Component
{
    public function removeFromWatchlist($id)
    {
        auth()->user()->watchlist()->detach($id);

        session()->flash('success', 'Rimosso dalla Watchlist');
    }

    public function render()
    {
        return view('livewire.watchlist-movies');
    }
}
