<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                </div>
                <div class="card-body">
                    <div class="row">
                        <li><a href="{{ url('/alunos') }}">Cadastro de Alunos</a></li>
                    </div>
                    <div class="row">
                        <li><a href="{{ url('/disciplinas') }}">Cadastro de Disciplinas</a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>