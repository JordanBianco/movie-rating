<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use App\Models\Review;
use Livewire\Component;

class ReviewedMovies extends Component
{
    public $search = '';
    public $dir = '';
    public $dateDir = 'latest';
    public $perPage = 10;

    public function clearFilters()
    {
        $this->dir = '';
        $this->dateDir = '';
    }

    public function deleteReview($id)
    {
        Review::find($id)->delete();

        session()->flash('success', 'Review Eliminata');
    }

    public function render()
    {
        return view('livewire.reviewed-movies', [
            'reviews' =>    Movie::join('reviews', 'movies.id', '=', 'reviews.movie_id')
                                ->select('movies.title', 'movies.slug', 'reviews.*')
                                ->where('user_id', auth()->user()->id)
                                ->where('movies.title', 'LIKE', '%'. $this->search .'%')
                                // Query eseguita se dir è presente
                                ->when($this->dir, function($query) {
                                    $query->orderBy('reviews.rating', $this->dir);
                                })
                                // Query eseguita se è presente dateDir
                                ->when($this->dateDir, function($query) {
                                    if ($this->dateDir == 'latest') {
                                        $query->latest();
                                    } elseif($this->dateDir == 'oldest') {
                                        $query->oldest();
                                    }
                                })
                                ->paginate($this->perPage)
        ]);
    }
}
