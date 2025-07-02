@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Magias</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('magias.create') }}">Cadastrar Nova Magia</a>

        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Escola</th>
                    <th>Nível</th>
                    <th>Classe Usuário</th>
                    <th>Verbal</th>
                    <th>Somático</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($magias as $magia)
                    <tr>
                        <td>{{ $magia->nome }}</td>
                        <td>{{ $magia->escola }}</td>
                        <td>{{ $magia->nivel }}</td>
                        <td>{{ $magia->classe_usuario }}</td>
                        <td>{{ $magia->verbais ? 'Sim' : 'Não' }}</td>
                        <td>{{ $magia->somaticos ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('magias.show', $magia->id) }}">Ver</a> |
                            <a href="{{ route('magias.edit', $magia->id) }}">Editar</a> |
                            <form action="{{ route('magias.destroy', $magia->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Confirma a exclusão?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                      <td colspan="7" style="text-align: center;">Nenhuma magia cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
