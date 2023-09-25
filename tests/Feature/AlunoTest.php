<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Aluno;

class AlunoTest extends TestCase
{
    use RefreshDatabase;

    public function test_function_aluno_create()
    {
        $alunoData = [
            'nome' => 'Novo Aluno',
            'idade' => 50,
            'email' => 'novoaluno@example.com',
        ];

        Aluno::create($alunoData);

        $this->assertDatabaseHas('alunos', $alunoData);
    }

    public function test_it_validates_required_name()
    {
        $response = $this->post('/alunos', [
            'nome' => '',
            'email' => 'johndoe@example.com',
        ]);

        $response->assertValid(['nome']);
    }

    /** @test */
    public function test_it_validates_name_minimum_length()
    {
        $response = $this->post('/alunos', [
            'nome' => 'J',
            'email' => 'johndoe@example.com',
        ]);

        $response->assertValid(['nome']);
    }

    /** @test */
    public function test_it_validates_name_maximum_length()
    {
        $response = $this->post('/alunos', [
            'nome' => str_repeat('a', 51),
            'email' => 'johndoe@example.com',
        ]);

        $response->assertValid(['nome']);
    }

    public function test_it_validates_valid_email()
    {
        $response = $this->post('/alunos', [
            'nome' => 'John Doe',
            'email' => 'invalid-email',
        ]);

        $response->assertValid(['email']);
    }

}