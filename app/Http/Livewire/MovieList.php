<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MovieList extends Component
{
    use WithPagination;
    
    public $search = '';
    public $searchYear = '';
    public $perPage = 10;
    public $voted = false;

    public function orderByVote()
    {
        $this->voted = !$this->voted;
    }

    public function toggleWatchlist($id)
    {
        if ( ! auth()->user()->watchlist()->pluck('movie_id')->contains($id)) {
            auth()->user()->watchlist()->attach($id);
        } else {
            auth()->user()->watchlist()->detach($id);
        }
    }

    public function render()
    {
        if (!$this->voted) {
            $movies = Movie::where('title', 'LIKE', '%'. $this->search .'%')
                    ->where('release_year', 'LIKE', '%'. $this->searchYear .'%')
                    ->latest()
                    ->paginate($this->perPage);
        } else {
            $movies = Movie::leftJoin('reviews', 'movies.id', '=', 'reviews.movie_id')
                    ->select('movies.*', DB::raw('AVG(reviews.rating) as avg'))
                    ->where('title', 'LIKE', '%'. $this->search .'%')
                    ->where('release_year', 'LIKE', '%'. $this->searchYear .'%')
                    ->groupBy('movies.id')
                    ->orderBy('avg', 'DESC')
                    ->paginate($this->perPage);
        }

        return view('livewire.movie-list', [
            'movies' => $movies,
        ]);
    }
}
