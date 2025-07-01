@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.view.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-container">
    <div class="ficha">
        <h1 class="ficha-titulo">{{ $equipamento->nome }}</h1>

        @if($equipamento->imagem)
        <div class="ficha-img-container">
            <img src="{{ asset('storage/' . $equipamento->imagem) }}" alt="{{ $equipamento->nome }}" class="ficha-img">
        </div>
        @endif

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Informações Básicas</h2>
            <p><strong>Categoria:</strong> {{ $equipamento->categoria ?? '-' }}</p>
            <p><strong>Tipo de Uso:</strong> {{ $equipamento->tipo_uso ?? '-' }}</p>
            <p><strong>Classe Necessária:</strong> {{ $equipamento->classe_necessaria ?? '-' }}</p>
            <p><strong>Requisitos:</strong> {!! nl2br(e($equipamento->requisitos)) ?? '-' !!}</p>
            <p><strong>Raridade:</strong> {{ $equipamento->raridade ?? '-' }}</p>
            <p><strong>Restrição de Uso:</strong> {!! nl2br(e($equipamento->restricao_uso)) ?? '-' !!}</p>
            <p><strong>Evoluções:</strong> {!! nl2br(e($equipamento->evolucoes)) ?? '-' !!}</p>
            <p><strong>Peso:</strong> {{ $equipamento->peso ?? '-' }}</p>
            <p><strong>Local de Origem:</strong> {{ $equipamento->local_origem ?? '-' }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Bônus e Habilidades</h2>
            <p><strong>Bônus:</strong> {!! nl2br(e($equipamento->bonus)) ?? '-' !!}</p>
            <p><strong>Habilidades Passivas:</strong> {!! nl2br(e($equipamento->habilidades_passivas)) ?? '-' !!}</p>
            <p><strong>Habilidades Ativas:</strong> {!! nl2br(e($equipamento->habilidades_ativas)) ?? '-' !!}</p>
            <p><strong>Durabilidade:</strong> {{ $equipamento->durabilidade ?? '-' }}</p>
            <p><strong>Afinidade Elemental:</strong> {{ $equipamento->afinidade_elemental ?? '-' }}</p>
            <p><strong>Encantamentos:</strong> {!! nl2br(e($equipamento->encantamentos)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">História e Conexões</h2>
            <p><strong>História:</strong> {!! nl2br(e($equipamento->historia)) ?? '-' !!}</p>
            <p><strong>Curiosidades:</strong> {!! nl2br(e($equipamento->curiosidades)) ?? '-' !!}</p>
            <p><strong>Conexões:</strong> {!! nl2br(e($equipamento->conexoes)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Detalhes Finais</h2>
            <p><strong>Preço:</strong> {{ $equipamento->preco ?? '-' }}</p>
        </div>
    </div>


    <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('equipamentos.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <form action="{{ route('equipamentos.edit', $equipamento->id) }}" method="GET">
        <button type="submit" class="sidebar-btn btn-atualizar">Editar Equipamento</button>
    </form>

    <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este equipamento?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="sidebar-btn btn-excluir">Excluir Equipamento</button>
    </form>

    </div>

</div>
@endsection
