<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AvgReviews extends Component
{
    public $movie;

    protected $listeners = ['review-added' => 'render'];

    public function render()
    {
        return view('livewire.avg-reviews', [
            'avg' => round($this->movie->reviews->avg('rating'), 0)
        ]);
    }
}
