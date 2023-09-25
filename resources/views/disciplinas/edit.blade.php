@extends('template_crud')
@section('content')

<div class="card">
    <div class="card-header">
        <h2>Cadastro de Disciplinas</h2>
    </div>
    <div class="card-body">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Há problemas nos seus dados: </strong>
                <button data-bs-dismiss="alert" type="button" class="btn-close"></button>
                <br>
                @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
                @endforeach
            </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ url('disciplinas/editar') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{ $disciplina['id'] }}">
                    <strong>Disciplina:</strong>
                    <input value="{{ $disciplina['nomedis'] }}" class="form-control mb-3" name="nomedis" type="text" />

                    <strong>Créditos:</strong>
                    <input value="{{ $disciplina['creddis'] }}" class="form-control mb-3" name="creddis" type="number" />

                    <div class="col">
                        <a class="btn btn-secondary" href="{{ url('/disciplinas') }}">Voltar</a>
                    </div>
                    <div class="col">
                        <button class="btn btn-primary float-end" type="submit">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection