@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.view.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-container">
    <div class="ficha">
        <h1 class="ficha-titulo">{{ $magia->nome }}</h1>

        @if($magia->imagem)
        <div class="ficha-img-container">
            <img src="{{ asset('storage/' . $magia->imagem) }}" alt="{{ $magia->nome }}" class="ficha-img">
        </div>
        @endif

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Identificação</h2>
            <p><strong>Escola:</strong> {{ $magia->escola }}</p>
            <p><strong>Nível:</strong> {{ $magia->nivel }}</p>
            <p><strong>Classe Usuário:</strong> {{ $magia->classe_usuario }}</p>
            <p><strong>Verbal:</strong> {{ $magia->verbais ? 'Sim' : 'Não' }}</p>
            <p><strong>Somático:</strong> {{ $magia->somaticos ? 'Sim' : 'Não' }}</p>
            <p><strong>Ritual:</strong> {{ $magia->ritual ? 'Sim' : 'Não' }}</p>
            <p><strong>Materiais:</strong><br> {!! nl2br(e($magia->materiais ?: 'Nenhum')) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Detalhes da Magia</h2>
            <p><strong>Área de Efeito:</strong> {{ $magia->area_efeito ?: 'Não informado' }}</p>
            <p><strong>Duração:</strong> {{ $magia->duracao ?: 'Não informado' }}</p>
            <p><strong>Descrição:</strong><br> {!! nl2br(e($magia->descricao)) !!}</p>
            <p><strong>Dano ou Benefício:</strong> {{ $magia->dano_beneficio ?: 'Não informado' }}</p>
            <p><strong>Alvo:</strong> {{ $magia->alvo ?: 'Não informado' }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Características Especiais</h2>
            <p><strong>Resistência:</strong><br> {!! nl2br(e($magia->resistencia ?: 'Nenhuma')) !!}</p>
            <p><strong>Interrupções:</strong> {{ $magia->interrupcoes ?: 'Nenhuma' }}</p>
            <p><strong>Aprimoramento:</strong><br> {!! nl2br(e($magia->aprimoramento ?: 'Nenhum')) !!}</p>
            <p><strong>Custo de Conjuração:</strong> {{ $magia->custo_conjuracao ?: 'Nenhum' }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Falhas e Contraindicações</h2>
            <p><strong>Falhas Críticas:</strong><br> {!! nl2br(e($magia->falhas_criticas ?: 'Nenhuma')) !!}</p>
            <p><strong>Contraindicações:</strong><br> {!! nl2br(e($magia->contraindicacoes ?: 'Nenhuma')) !!}</p>
            <p><strong>Variações Regionais:</strong><br> {!! nl2br(e($magia->variacoes_regionais ?: 'Nenhuma')) !!}</p>
        </div>
    </div>

    <div class="sidebar-direita">
        <h3>Ações</h3>

        <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

        <a href="{{ route('magias.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>
        
        <form action="{{ route('magias.edit', $magia->id) }}" method="GET">
            <button type="submit" class="sidebar-btn btn-atualizar">Editar Magia</button>
        </form>

        <form action="{{ route('magias.destroy', $magia->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta magia?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="sidebar-btn btn-excluir">Excluir Magia</button>
        </form>
    </div>
</div>
@endsection
