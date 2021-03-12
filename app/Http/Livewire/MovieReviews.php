<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Livewire\Component;

class MovieReviews extends Component
{
    public $movie;

    public $rating = 0;
    public $body = '';
    
    public $perPage = 5;
    public $order = 'latest';
    
    public $success = false;

    protected $rules = [
        'rating' => 'required|numeric|min:1|max:5',
        'body' => 'required|max:500',
    ];

    // Add new review
    public function addReview()
    {
        $this->validate();

        Review::create([
            'user_id' => auth()->user()->id,
            'movie_id' => $this->movie->id,
            'rating' => $this->rating,
            'body' => $this->body,
        ]);

        $this->resetValue();

        $this->success = true;
        
        session()->flash('message', 'Grazie per la tua recensione!');

        $this->emit('review-added');
    }

    // Set Rating
    public function setRating($val)
    {
        $this->rating = $val;
    }

    // Reset rating and body value
    public function resetValue()
    {
        $this->reset(['rating', 'body']);
    }

    public function render()
    {
        switch ($this->order) {
            case 'latest':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->latest()
                    ->with('author')
                    ->paginate($this->perPage);
                break;

            case 'oldest':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->oldest()
                    ->with('author')
                    ->paginate($this->perPage);
                break;

            case 'high':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->orderBy('rating', 'DESC')
                    ->with('author')
                    ->paginate($this->perPage);
                break;
            case 'low':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->orderBy('rating', 'ASC')
                    ->with('author')
                    ->paginate($this->perPage);
                break;
        }
        
        return view('livewire.movie-reviews', [
            'reviews' => $reviews
        ]);
    }
}
