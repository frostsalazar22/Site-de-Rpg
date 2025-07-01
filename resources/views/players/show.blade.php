@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.view.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-container">
    <div class="ficha">
        <h1 class="ficha-titulo">{{ $player->nome }}</h1>

        @if($player->imagem)
        <div class="ficha-img-container">
            <img src="{{ asset('storage/' . $player->imagem) }}" alt="{{ $player->nome }}" class="ficha-img">
        </div>
        @endif

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Identificação</h2>
            <p><strong>Raça:</strong> {{ $player->raca ?? '-' }}</p>
            <p><strong>Classe:</strong> {{ $player->classe ?? '-' }}</p>
            <p><strong>Alinhamento:</strong> {{ $player->alinhamento ?? '-' }}</p>
            <p><strong>Idade:</strong> {{ $player->idade ?? '-' }}</p>
            <p><strong>Gênero:</strong> {{ $player->genero ?? '-' }}</p>
            <p><strong>Altura:</strong> {{ $player->altura ?? '-' }}</p>
            <p><strong>Peso:</strong> {{ $player->peso ?? '-' }}</p>
            <p><strong>Aparência:</strong> {!! nl2br(e($player->aparencia)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Atributos</h2>
            <p><strong>Força:</strong> {{ $player->forca ?? '-' }}</p>
            <p><strong>Destreza:</strong> {{ $player->destreza ?? '-' }}</p>
            <p><strong>Constituição:</strong> {{ $player->constituicao ?? '-' }}</p>
            <p><strong>Inteligência:</strong> {{ $player->inteligencia ?? '-' }}</p>
            <p><strong>Sabedoria:</strong> {{ $player->sabedoria ?? '-' }}</p>
            <p><strong>Carisma:</strong> {{ $player->carisma ?? '-' }}</p>
            <p><strong>Pontos de Vida (Máx):</strong> {{ $player->pontos_vida_max ?? '-' }}</p>
            <p><strong>Pontos de Vida (Atual):</strong> {{ $player->pontos_vida_atual ?? '-' }}</p>
            <p><strong>Classe de Armadura:</strong> {{ $player->classe_armadura ?? '-' }}</p>
            <p><strong>Iniciativa:</strong> {{ $player->iniciativa ?? '-' }}</p>
            <p><strong>Velocidade:</strong> {{ $player->velocidade ?? '-' }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Habilidades e Magias</h2>
            <p><strong>Habilidades Passivas:</strong> {!! nl2br(e($player->habilidades_passivas)) ?? '-' !!}</p>
            <p><strong>Habilidades Ativas:</strong> {!! nl2br(e($player->habilidades_ativas)) ?? '-' !!}</p>
            <p><strong>Magias Conhecidas:</strong> {!! nl2br(e($player->magias_conhecidas)) ?? '-' !!}</p>
            <p><strong>Slots de Magia:</strong> {!! nl2br(e($player->slots_magia)) ?? '-' !!}</p>
            <p><strong>Magias Preparadas:</strong> {!! nl2br(e($player->magias_preparadas)) ?? '-' !!}</p>
            <p><strong>Talentos / Proficiências:</strong> {!! nl2br(e($player->talentos_proficiências)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Inventário</h2>
            <p><strong>Equipamentos Básicos:</strong> {!! nl2br(e($player->equipamentos_basicos)) ?? '-' !!}</p>
            <p><strong>Itens Utilizáveis:</strong> {!! nl2br(e($player->itens_utilizaveis)) ?? '-' !!}</p>
            <p><strong>Recursos:</strong> {!! nl2br(e($player->recursos)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Personalidade</h2>
            <p><strong>Motivações:</strong> {!! nl2br(e($player->motivacoes)) ?? '-' !!}</p>
            <p><strong>Medos e Fraquezas:</strong> {!! nl2br(e($player->medos_fraquezas)) ?? '-' !!}</p>
            <p><strong>Traços de Personalidade:</strong> {!! nl2br(e($player->traços_personalidade)) ?? '-' !!}</p>
            <p><strong>Ideais:</strong> {!! nl2br(e($player->ideais)) ?? '-' !!}</p>
            <p><strong>Vínculos:</strong> {!! nl2br(e($player->vinculos)) ?? '-' !!}</p>
            <p><strong>Defeitos:</strong> {!! nl2br(e($player->defeitos)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">História</h2>
            <p><strong>Background:</strong> {!! nl2br(e($player->background)) ?? '-' !!}</p>
            <p><strong>Eventos Marcantes:</strong> {!! nl2br(e($player->eventos_marcantes)) ?? '-' !!}</p>
            <p><strong>Conexões:</strong> {!! nl2br(e($player->conexoes)) ?? '-' !!}</p>
            <p><strong>Segredos:</strong> {!! nl2br(e($player->segredos)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Estatísticas de Combate</h2>
            <p><strong>Ataques e Magias:</strong> {!! nl2br(e($player->ataques_magias)) ?? '-' !!}</p>
            <p><strong>Resistências:</strong> {!! nl2br(e($player->resistencias)) ?? '-' !!}</p>
            <p><strong>Fraquezas:</strong> {!! nl2br(e($player->fraquezas)) ?? '-' !!}</p>
            <p><strong>Testes de Resistência:</strong> {!! nl2br(e($player->testes_resistencia)) ?? '-' !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Notas Finais</h2>
            <p><strong>Frases de Efeito:</strong> {!! nl2br(e($player->frases_efeito)) ?? '-' !!}</p>
        </div>
    </div>

    <div class="sidebar-direita">
        <h3>Ações</h3>

        <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

        <a href="{{ route('players.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

        <form action="{{ route('players.edit', $player->id) }}" method="GET">
            <button type="submit" class="sidebar-btn btn-atualizar">Editar Player</button>
        </form>

        <form action="{{ route('players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este player?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="sidebar-btn btn-excluir">Excluir Player</button>
        </form>
    </div>
</div>
@endsection
