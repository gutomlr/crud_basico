<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{

    use RefreshDatabase;

    public function test_login_redirects_to_dashboard()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_redirects_to_dashboard_successfully()
    {
        User::Factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }

    public function test_auth_user_can_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
    }


    public function test_unath_user_cannot_access_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_user_has_name_attribute()
    {
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        $this->assertEquals('John Doe', $user->name);
    }

}
