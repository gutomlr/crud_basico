<?php

namespace Tests\Feature;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_checking_the_home_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_checking_the_alunos_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/alunos');

        $response->assertStatus(200);
        $response->assertSee('Alunos');
    }

    public function test_checking_the_alunos_create_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/alunos/novo');

        $response->assertStatus(200);
    }

        public function test_checking_the_disciplinas_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/disciplinas');

        $response->assertStatus(200);
        $response->assertSee('Disciplinas');
    }

    public function test_checking_the_disciplinas_create_page_route_returns_a_successful_response(): void
    {
        $response = $this->get('/disciplinas/novo');

        $response->assertStatus(200);
    }

    
}
