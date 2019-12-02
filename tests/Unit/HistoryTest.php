<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class HistoryTest extends TestCase
{
    /**
     * A home page can be displayed.
     *
     * @return void
     */
    public function testHistoryPageDisplayed()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/history');
        $response->assertStatus(200);

        $this->assertAuthenticatedAs($user);
    }
}
