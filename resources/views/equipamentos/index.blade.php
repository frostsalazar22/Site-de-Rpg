@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Equipamentos</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('equipamentos.create') }}">Cadastrar Novo Equipamento</a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Tipo de Uso</th>
                <th>Raridade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipamentos as $equipamento)
                <tr>
                    <td>{{ $equipamento->nome }}</td>
                    <td>{{ $equipamento->categoria ?? '-' }}</td>
                    <td>{{ $equipamento->tipo_uso ?? '-' }}</td>
                    <td>{{ $equipamento->raridade ?? '-' }}</td>
                    <td>
                        <a href="{{ route('equipamentos.show', $equipamento->id) }}">Ver</a> |
                        <a href="{{ route('equipamentos.edit', $equipamento->id) }}">Editar</a> |
                        <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Confirma a exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="text-align: center;">Nenhum equipamento cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
