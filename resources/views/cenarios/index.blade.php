@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Cenários</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('cenarios.create') }}" style="display: inline-block; margin-bottom: 15px;">Cadastrar Novo Cenário</a>

        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 10px;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Ambientação</th>
                    <th>Período Temporal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cenarios as $cenario)
                    <tr>
                        <td>{{ $cenario->nome }}</td>
                        <td>{{ $cenario->tipo ?? '-' }}</td>
                        <td>{{ $cenario->ambientacao ?? '-' }}</td>
                        <td>{{ $cenario->periodo_temporal ?? '-' }}</td>
                        <td>
                            <a href="{{ route('cenarios.show', $cenario->id) }}">Ver</a> |
                            <a href="{{ route('cenarios.edit', $cenario->id) }}">Editar</a> |
                            <form action="{{ route('cenarios.destroy', $cenario->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Confirma a exclusão deste cenário?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">Nenhum cenário cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
