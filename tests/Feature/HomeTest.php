<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class HomeTest extends TestCase
{
    /**
     * A home page can be displayed.
     *
     * @return void
     */
    public function testHomePageDisplayed()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);

        $this->assertAuthenticatedAs($user);
    }
}
