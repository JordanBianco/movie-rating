<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateReview extends Component
{
    public $review;
    public $rating;
    public $body;

    public $success = false;

    public function mount($review)
    {
        $this->review = $review;
        $this->rating = $this->review->rating;
        $this->body = $this->review->body;
    }

    protected $rules = [
        'rating' => 'required|numeric|min:1|max:5',
        'body' => 'required|max:500',
    ];

    public function updateReview()
    {
        $this->validate();

        $this->review->update([
            'rating' => $this->rating,
            'body' => $this->body,
        ]);

        $this->success = true;
    }

    // Set Rating
    public function setRating($val)
    {
        $this->rating = $val;
    }

    public function render()
    {
        return view('livewire.update-review');
    }
}
