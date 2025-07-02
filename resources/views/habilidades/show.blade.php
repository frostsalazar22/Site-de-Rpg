@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.view.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-container">
    <div class="ficha">
        <h1 class="ficha-titulo">{{ $habilidade->nome }}</h1>

        @if($habilidade->imagem)
        <div class="ficha-img-container">
            <img src="{{ asset('storage/' . $habilidade->imagem) }}" alt="{{ $habilidade->nome }}" class="ficha-img">
        </div>
        @endif

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Identificação</h2>
            <p><strong>Tipo:</strong> {{ $habilidade->tipo ?? '-' }}</p>
            <p><strong>Classe Usuário:</strong> {{ $habilidade->classe_usuario ?? '-' }}</p>
            <p><strong>Nível Necessário:</strong> {{ $habilidade->nivel_necessario ?? '-' }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Efeitos</h2>
            <p><strong>Descrição:</strong> {!! nl2br(e($habilidade->descricao)) !!}</p>
            <p><strong>Dano ou Benefício:</strong> {{ $habilidade->dano_beneficio ?? '-' }}</p>
            <p><strong>Área de Ação:</strong> {{ $habilidade->area_acao ?? '-' }}</p>
            <p><strong>Duração:</strong> {{ $habilidade->duracao ?? '-' }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Detalhes Avançados</h2>
            <p><strong>Condições de Ativação:</strong> {!! nl2br(e($habilidade->condicoes_ativacao)) ?? '-' !!}</p>
            <p><strong>Interações:</strong> {!! nl2br(e($habilidade->interacoes)) ?? '-' !!}</p>
            <p><strong>Aprimoramentos:</strong> {!! nl2br(e($habilidade->aprimoramentos)) ?? '-' !!}</p>
            <p><strong>Restrições:</strong> {!! nl2br(e($habilidade->restricoes)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Riscos e Consequências</h2>
            <p><strong>Custo Adicional:</strong> {{ $habilidade->custo_adicional ?? '-' }}</p>
            <p><strong>Falha:</strong> {!! nl2br(e($habilidade->falha)) ?? '-' !!}</p>
            <p><strong>Contraindicações:</strong> {!! nl2br(e($habilidade->contraindicacoes)) ?? '-' !!}</p>
        </div>
    </div>

    <div class="sidebar-direita">
        <h3>Ações</h3>

        <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

        <a href="{{ route('habilidades.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

        <form action="{{ route('habilidades.edit', $habilidade->id) }}" method="GET">
            <button type="submit" class="sidebar-btn btn-atualizar">Editar Habilidade</button>
        </form>

        <form action="{{ route('habilidades.destroy', $habilidade->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta habilidade?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="sidebar-btn btn-excluir">Excluir Habilidade</button>
        </form>
    </div>
</div>
@endsection
