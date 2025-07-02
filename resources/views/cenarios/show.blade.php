@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.view.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-container">
    <div class="ficha">
        <h1 class="ficha-titulo">{{ $cenario->nome }}</h1>

        @if($cenario->imagem)
        <div class="ficha-img-container">
            <img src="{{ asset('storage/' . $cenario->imagem) }}" alt="{{ $cenario->nome }}" class="ficha-img">
        </div>
        @endif

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Identificação</h2>
            <p><strong>Tipo:</strong> {{ $cenario->tipo ?? '-' }}</p>
            <p><strong>Ambientação:</strong> {{ $cenario->ambientacao ?? '-' }}</p>
            <p><strong>Período Temporal:</strong> {{ $cenario->periodo_temporal ?? '-' }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Geografia e Ambiente</h2>
            <p><strong>Descrição Física:</strong> {!! nl2br(e($cenario->descricao_fisica)) !!}</p>
            <p><strong>Clima:</strong> {{ $cenario->clima ?? '-' }}</p>
            <p><strong>Recursos Naturais:</strong> {!! nl2br(e($cenario->recursos_naturais)) !!}</p>
            <p><strong>Locais Importantes:</strong> {!! nl2br(e($cenario->locais_importantes)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">População e Cultura</h2>
            <p><strong>Raças/Espécies:</strong> {!! nl2br(e($cenario->racas_especies)) !!}</p>
            <p><strong>Sociedade:</strong> {!! nl2br(e($cenario->sociedade)) !!}</p>
            <p><strong>Crenças e Religião:</strong> {!! nl2br(e($cenario->crencas_religiao)) !!}</p>
            <p><strong>Línguas e Costumes:</strong> {!! nl2br(e($cenario->linguas_costumes)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">História e Política</h2>
            <p><strong>Eventos Importantes:</strong> {!! nl2br(e($cenario->eventos_importantes)) !!}</p>
            <p><strong>Conflitos Atuais:</strong> {!! nl2br(e($cenario->conflitos_atuais)) !!}</p>
            <p><strong>Líderes e Personagens:</strong> {!! nl2br(e($cenario->lideres_personagens)) !!}</p>
            <p><strong>Alianças e Inimizades:</strong> {!! nl2br(e($cenario->aliancas_inimizades)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Magia e Tecnologia</h2>
            <p><strong>Nível Tecnológico:</strong> {{ $cenario->nivel_tecnologico ?? '-' }}</p>
            <p><strong>Presença de Magia:</strong> {{ $cenario->presenca_magia ?? '-' }}</p>
            <p><strong>Instituições Mágicas e Científicas:</strong> {!! nl2br(e($cenario->instituicoes_magicas_cientificas)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Ameaças e Desafios</h2>
            <p><strong>Inimigos Comuns:</strong> {!! nl2br(e($cenario->inimigos_comuns)) !!}</p>
            <p><strong>Perigos Naturais:</strong> {!! nl2br(e($cenario->perigos_naturais)) !!}</p>
            <p><strong>Conflitos Internos:</strong> {!! nl2br(e($cenario->conflitos_internos)) !!}</p>
            <p><strong>Mistérios e Segredos:</strong> {!! nl2br(e($cenario->misterios_segredos)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Exploração e Interação</h2>
            <p><strong>Locais de Aventuras:</strong> {!! nl2br(e($cenario->locais_aventuras)) !!}</p>
            <p><strong>NPCs Importantes:</strong> {!! nl2br(e($cenario->npcs_importantes)) !!}</p>
            <p><strong>Recursos para Jogadores:</strong> {!! nl2br(e($cenario->recursos_jogadores)) !!}</p>
            <p><strong>Recompensas e Tesouros:</strong> {!! nl2br(e($cenario->recompensas_tesouros)) !!}</p>
        </div>
    </div>

    <div class="sidebar-direita">
        <h3>Ações</h3>

        <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

        <a href="{{ route('cenarios.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

        <form action="{{ route('cenarios.edit', $cenario->id) }}" method="GET">
            <button type="submit" class="sidebar-btn btn-atualizar">Editar Cenário</button>
        </form>

        <form action="{{ route('cenarios.destroy', $cenario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cenário?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="sidebar-btn btn-excluir">Excluir Cenário</button>
        </form>
    </div>

</div>
@endsection
