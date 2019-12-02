<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterTest extends TestCase
{
    /**
     * A registration form can be displayed.
     *
     * @return void
     */
    public function testRegisterFormDisplayed()
    {
        $response = $this->get('/register');
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
        $response->assertStatus(200);

        $this->assertGuest();
    }

    /**
     * A valid user can be registered.
     *
     * @return void
     */
    public function testRegistersAValidUser()
    {
        $user = factory(User::class)->make();
        
        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => '123456'
        ]);
        
        $response->assertStatus(302);

        $this->assertAuthenticated();
    }

    /**
     * An invalid user is not registered.
     *
     * @return void
     */
    public function testDoesNotRegisterAnInvalidUser()
    {
        $user = factory(User::class)->make();

        $response = $this->post('register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'two',
        ]);

        $response->assertSessionHasErrors();

        $this->assertGuest();
    }
}
