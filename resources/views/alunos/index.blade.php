@extends('template_crud')
@section('content')

<div class="card mt-5">

    <div class="card-header">
        <h2>Lista de Alunos</h2>
    </div>

    <div class="card-body">
        @if ($message = Session::get('msgSuccess'))
        <div class="row">
            <div class="alert alert-success alert-dismissible">
                <div>{{ $message }}</div>
                <button data-bs-dismiss="alert" type="button" class="btn-close"></button>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col">
                <a class="btn btn-success float-end" href="{{ url('/alunos/novo') }}">Cadastrar</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                    @foreach($lista as $aluno)
                    <tr>
                        <td>{{ $aluno['nome'] }}</td>
                        <td>{{ $aluno['idade'] }}</td>
                        <td>{{ $aluno['email'] }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('/alunos/editar', ['id' => $aluno['id']]) }}">Editar</a>
                            <a onclick="atualizaHref(this)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger" href="{{ url('/alunos/delete', ['id' => $aluno['id']]) }}">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                            Total de alunos: {{ $total }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a class="btn btn-secondary float-end" href="{{ url('/') }}">Voltar</a>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir esse aluno?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a id="btnConfirmar" href="" class="btn btn-primary">Confirmar</a>
      </div>
    </div>
  </div>
</div>
<script>
    function atualizaHref(elemento) {
        document.getElementById('btnConfirmar').setAttribute('href', elemento.href);
    }
</script>
@endsection