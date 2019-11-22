<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    /**
     * The login form can be displayed.
     *
     * @return void
     */
    public function testLoginFormDisplayed()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
        $response->assertStatus(200);

        $this->assertGuest();
    }

    /**
     * The login form can not be displayed.
     *
     * @return void
     */
    public function testLoginFormNotDisplayed()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');        
        $response->assertRedirect('/home');
        $response->assertStatus(302);
    }

    /**
     * A valid user can be logged in.
     *
     * @return void
     */
    public function testLoginAValidUser()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->post('/login', [
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),
        ]);

        $response->assertRedirect('/home');
        $response->assertStatus(302);

        $this->assertAuthenticatedAs($user);
    }

    /**
     * An invalid user cannot be logged in.
     *
     * @return void
     */
    public function testDoesNotLoginAnInvalidUser()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('123456')
        ]);
        
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);
        
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $response->assertStatus(302);
        
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /**
     * A logged in user can be logged out.
     *
     * @return void
     */
    public function testLogoutAnAuthenticatedUser()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->post('/logout');
        $response->assertStatus(302);

        $this->assertGuest();
    }
}
