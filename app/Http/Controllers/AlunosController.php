<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlunosController extends Controller
{
    //
    public function index()
    {
        $listaAlunos = DB::table('alunos')->orderBy('nome', 'asc')->get();
        $listaAlunos = json_decode($listaAlunos, true);
        $totalAlunos = DB::table('alunos')->count();
        return view('alunos.index', ['lista' => $listaAlunos, 
                                     'total' => $totalAlunos]);
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nome' => 'required|min:2|max:50',
            'email' => 'email:rfc,dns'
        ]);
        
        Aluno::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'email' => $request->email
        ]);
        return redirect('/alunos')->with('msgSuccess', 'Aluno cadastrado com sucesso');
    }

    public function edit($id)
    {
        //find é o método que faz select * from alunos where id= ?
        $aluno = Aluno::find($id);
        //retornamos a view passando a TUPLA de aluno consultado
        return view('alunos.edit', ['aluno' => $aluno]);
    }
    public function update(Request $request)
    {
        //find é o método que faz select * from alunos where id= ?
        $aluno = Aluno::find($request->id);
        //método update faz um update aluno set nome = ?, idade=? ...
        $aluno->update([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'email' => $request->email
        ]);
        return redirect('/alunos');
    }

    public function destroy($id)
    {
        //select * from aluno where id = ?
        $aluno = Aluno::find($id);
        //deleta o aluno no banco
        $aluno->delete();
        return redirect('/alunos');
    }

}
