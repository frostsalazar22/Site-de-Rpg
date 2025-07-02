@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Habilidades</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <a href="{{ route('habilidades.create') }}">Cadastrar Nova Habilidade</a>

        <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Classe Usuário</th>
                    <th>Nível Necessário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($habilidades as $habilidade)
                    <tr>
                        <td>{{ $habilidade->nome }}</td>
                        <td>{{ $habilidade->tipo ?? '-' }}</td>
                        <td>{{ $habilidade->classe_usuario ?? '-' }}</td>
                        <td>{{ $habilidade->nivel_necessario ?? '-' }}</td>
                        <td>
                            <a href="{{ route('habilidades.show', $habilidade->id) }}">Ver</a> |
                            <a href="{{ route('habilidades.edit', $habilidade->id) }}">Editar</a> |
                            <form action="{{ route('habilidades.destroy', $habilidade->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Confirma a exclusão?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($habilidades->isEmpty())
                    <tr><td colspan="5" style="text-align: center;">Nenhuma habilidade cadastrada.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
