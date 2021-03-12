<?php

namespace Tests\Feature;

use App\Http\Livewire\AddMovieReview;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_review_component_can_be_rendered()
    {
        $movie = Movie::factory()->create();

        $this->get('/movies/' . $movie->slug)->assertSeeLivewire('add-movie-review');
    }

    public function test_auth_user_can_add_review()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(AddMovieReview::class)
            ->set('rating', 5)
            ->call('addReview');

        $this->assertCount(1, auth()->user()->reviews);
    }
}
