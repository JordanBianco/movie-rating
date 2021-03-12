<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MovieTest extends TestCase
{
    use RefreshDatabase;

    public function test_movies_list_component_can_be_rendered()
    {
        $this->get('/movies')->assertSeeLivewire('movie-list');
    }

    public function test_movies_list_can_be_rendered_in_the_component()
    {
        $movie = Movie::factory()->create();

        $this->get('/movies')
            ->assertSee($movie->title)
            ->assertSee($movie->release_year);
    }

    public function test_movie_detail_page_can_be_rendered()
    {
        $movie = Movie::factory()->create();

        $this->get('/movies/' . $movie->slug)
            ->assertSee($movie->title);
    }

}
