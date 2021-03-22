<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashbaordTest extends TestCase
{
    use RefreshDatabase;

    public function test_logged_in_user_can_view_saved_movies_in_the_dashboard()
    {
        $this->get('dashboard')->assertRedirect('login');

        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get('dashboard')
            ->assertOk();
            // ->assertSee($user->watchlist);
    }
}
