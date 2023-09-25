<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisciplinasController extends Controller
{
    public function index()
    {
        $listaDisciplinas = DB::table('disciplinas')->orderBy('nomedis', 'asc')->get();
        $listaDisciplinas = json_decode($listaDisciplinas, true);
        $totalDisciplinas = DB::table('disciplinas')->count();
        return view('disciplinas.index', ['lista' => $listaDisciplinas,
                                        'total' => $totalDisciplinas]);
    }

    public function create()
    {
        return view("disciplinas.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomedis' => 'required|min:2|max:50',
            'creddis' => 'required|min:1|max:50'
        ]);
        
        Disciplina::create([
            'nomedis' => $request->nomedis,
            'creddis' => $request->creddis
        ]);
        return redirect('/disciplinas')->with('msgSuccess', 'Disciplina cadastrada com sucesso');
    }

    public function edit($id) {
        $disciplina = Disciplina::find($id);
        return view('disciplinas.edit', ['disciplina' => $disciplina]);
    }

    public function update (Request $request) {
        $disciplina = Disciplina::find($request->id);
        $disciplina->update([
            'nomedis' => $request->nomedis,
            'creddis' => $request->creddis
        ]);
        return redirect('/disciplinas');
    }

    public function destroy($id)
    {
        $disciplina = Disciplina::find($id);
        $disciplina->delete();
        return redirect('/disciplinas');
    }
}
