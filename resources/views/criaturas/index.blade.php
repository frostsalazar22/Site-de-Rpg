@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Criaturas</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('criaturas.create') }}">Cadastrar Nova Criatura</a>

        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($criaturas as $criatura)
                    <tr>
                        <td>{{ $criatura->nome }}</td>
                        <td>{{ $criatura->tipo }}</td>
                        <td>
                            <a href="{{ route('criaturas.show', $criatura->id) }}">Ver</a> |
                            <a href="{{ route('criaturas.edit', $criatura->id) }}">Editar</a> |
                            <form action="{{ route('criaturas.destroy', $criatura->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Confirma a exclusão?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($criaturas->isEmpty())
                    <tr><td colspan="3" style="text-align: center;">Nenhuma criatura cadastrada.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
