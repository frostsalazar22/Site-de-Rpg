@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Players</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('players.create') }}">Cadastrar Novo Player</a>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Raça</th>
                <th>Classe</th>
                <th>Alinhamento</th>
                <th>Pontos de Vida</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($players as $player)
                <tr>
                    <td>{{ $player->nome }}</td>
                    <td>{{ $player->raca ?? '-' }}</td>
                    <td>{{ $player->classe ?? '-' }}</td>
                    <td>{{ $player->alinhamento ?? '-' }}</td>
                    <td>
                        {{ $player->pontos_vida_atual ?? 0 }} / {{ $player->pontos_vida_max ?? 0 }}
                    </td>
                    <td>
                        <a href="{{ route('players.show', $player->id) }}">Ver</a> |
                        <a href="{{ route('players.edit', $player->id) }}">Editar</a> |
                        <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Confirma a exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align: center;">Nenhum player cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Paginação, se houver --}}
    <div style="margin-top: 20px;">
        {{ $players->links() }}
    </div>
</div>
@endsection
