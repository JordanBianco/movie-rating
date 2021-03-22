<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MovieReviewHelpful extends Component
{
    public $review;

    public function toggleLike()
    {
        if ( ! auth()->user()->likes()->pluck('review_id')->contains($this->review->id)) {
            
            auth()->user()->likes()->create([
                'review_id' => $this->review->id
            ]);

        } else {
            auth()->user()->likes()->where('review_id', $this->review->id)->delete();
        }

        // $this->emit('like_added');
    }

    public function render()
    {
        return view('livewire.movie-review-helpful');
    }
}
