<?php

namespace App\Http\Livewire;

use App\Models\Feed;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class MovieReviews extends Component
{
    use WithPagination;
    
    public $movie;

    public $rating = 0;
    public $body = '';
    
    public $perPage = 5;
    public $order = 'latest';
    
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

        // Points to the User
        auth()->user()->profile->points += 1;
        auth()->user()->profile->save();

        $this->resetValue();
        
        // Feedback to the user
        session()->flash('message', 'Grazie per la tua recensione!');
        
        // Close the Modal
        $this->dispatchBrowserEvent('review-added');

        // Update the average ratings of the movie
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

    public function toggleLike($id)
    {
        if ( ! auth()->user()->likes()->pluck('review_id')->contains($id)) {
            auth()->user()->likes()->create([
                'review_id' => $id
            ]);

        } else {
            auth()->user()->likes()->where('review_id', $id)->delete();
        }
    }


    public function render()
    {
        switch ($this->order) {
            case 'latest':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->latest()
                    ->with('author')
                    ->withCount('likes')
                    ->paginate($this->perPage);
                break;

            case 'oldest':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->oldest()
                    ->with('author')
                    ->withCount('likes')
                    ->paginate($this->perPage);
                break;

            case 'high':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->orderBy('rating', 'DESC')
                    ->with('author')
                    ->withCount('likes')
                    ->paginate($this->perPage);
                break;
            case 'low':
                $reviews = Review::where('movie_id', $this->movie->id)
                    ->orderBy('rating', 'ASC')
                    ->with('author')
                    ->withCount('likes')
                    ->paginate($this->perPage);
                break;
        }
        
        return view('livewire.movie-reviews', [
            'reviews' => $reviews
        ]);
    }
}
