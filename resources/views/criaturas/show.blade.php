@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.view.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-container">
    <div class="ficha">
        <h1 class="ficha-titulo">{{ $criatura->nome }}</h1>

        @if($criatura->imagem)
        <div class="ficha-img-container">
            <img src="{{ asset('storage/' . $criatura->imagem) }}" alt="{{ $criatura->nome }}" class="ficha-img">
        </div>
        @endif

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Identificação</h2>
            <p><strong>Tipo:</strong> {{ $criatura->tipo }}</p>
            <p><strong>Subtipo:</strong> {{ $criatura->subtipo }}</p>
            <p><strong>Alinhamento:</strong> {{ $criatura->alinhamento }}</p>
            <p><strong>Classe de Desafio:</strong> {{ $criatura->classe_desafio }}</p>
            <p><strong>Categoria de Perigo:</strong> {{ $criatura->categoria_perigo }}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Características Físicas</h2>
            <p><strong>Tamanho:</strong> {{ $criatura->tamanho }}</p>
            <p><strong>Velocidade:</strong> {{ $criatura->velocidade }}</p>
            <p><strong>Aparência:</strong> {!! nl2br(e($criatura->aparencia)) !!}</p>
            <p><strong>Peso e Altura:</strong> {{ $criatura->peso_altura }}</p>
            <p><strong>Localização Preferida:</strong> {{ $criatura->localizacao_preferida }}</p>
            <p><strong>Presença Ambiental:</strong> {!! nl2br(e($criatura->presenca_ambiental)) !!}</p>
        </div>

        <div class="ficha-section atributos">
        <h2 class="titulo-centralizado">Atributos</h2>
        <div class="atributos-grid">
            <div><strong>FOR:</strong><br>{{ $criatura->for }}</div>
            <div><strong>DES:</strong><br>{{ $criatura->des }}</div>
            <div><strong>CON:</strong><br>{{ $criatura->con }}</div>
            <div><strong>INT:</strong><br>{{ $criatura->int }}</div>
            <div><strong>SAB:</strong><br>{{ $criatura->sab }}</div>
            <div><strong>CAR:</strong><br>{{ $criatura->car }}</div>
        </div>
        </div>



        <div class="ficha-section">
            <h2 class="titulo-centralizado">Resistências</h2>
            <p><strong>Resistências:</strong> {!! nl2br(e($criatura->resistencias)) !!}</p>
            <p><strong>Imunidades:</strong> {!! nl2br(e($criatura->imunidades)) !!}</p>
            <p><strong>Vulnerabilidades:</strong> {!! nl2br(e($criatura->vulnerabilidades)) !!}</p>
            <p><strong>Condicionais:</strong> {!! nl2br(e($criatura->resistencias_condicionais)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Combate</h2>
            <p><strong>PV:</strong> {{ $criatura->pv }}</p>
            <p><strong>CA:</strong> {{ $criatura->ca }}</p>
            <p><strong>Reações:</strong> {!! nl2br(e($criatura->reacoes)) !!}</p>
            <p><strong>Condições Infligidas:</strong> {!! nl2br(e($criatura->condicoes_infligidas)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Ações</h2>
            <p><strong>Comuns:</strong> {!! nl2br(e($criatura->ataques_comuns)) !!}</p>
            <p><strong>Especiais:</strong> {!! nl2br(e($criatura->acoes_especiais)) !!}</p>
            <p><strong>Lendárias:</strong> {!! nl2br(e($criatura->acoes_lendarias)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Lore</h2>
            <p><strong>Origem:</strong> {!! nl2br(e($criatura->origem)) !!}</p>
            <p><strong>Motivações:</strong> {!! nl2br(e($criatura->motivacoes)) !!}</p>
            <p><strong>Hábito Social:</strong> {!! nl2br(e($criatura->habito_social)) !!}</p>
            <p><strong>Mistérios:</strong> {!! nl2br(e($criatura->misterios)) !!}</p>
            <p><strong>Rotina:</strong> {!! nl2br(e($criatura->rotina)) !!}</p>
            <p><strong>Impacto no Mundo:</strong> {!! nl2br(e($criatura->impacto_mundo)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Estágios</h2>
            <p><strong>Descrição:</strong> {!! nl2br(e($criatura->descricao_estagios)) !!}</p>
            <p><strong>Condições:</strong> {!! nl2br(e($criatura->condicoes_transicao)) !!}</p>
            <p><strong>Estágio 1:</strong> {!! nl2br(e($criatura->estagio_1)) !!}</p>
            <p><strong>Estágio 2:</strong> {!! nl2br(e($criatura->estagio_2)) !!}</p>
            <p><strong>Estágio 3:</strong> {!! nl2br(e($criatura->estagio_3)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Habilidades</h2>
            <p><strong>Passivas:</strong> {!! nl2br(e($criatura->habilidades_passivas)) !!}</p>
            <p><strong>Ativas:</strong> {!! nl2br(e($criatura->habilidades_ativas)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Interações Narrativas</h2>
            <p><strong>Influência:</strong> {!! nl2br(e($criatura->influencia_jogo)) !!}</p>
            <p><strong>Conexões:</strong> {!! nl2br(e($criatura->conexoes)) !!}</p>
            <p><strong>Cinemáticos:</strong> {!! nl2br(e($criatura->detalhes_cinematicos)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Recompensas</h2>
            <p><strong>Tesouro:</strong> {!! nl2br(e($criatura->tesouro)) !!}</p>
            <p><strong>Alquimia:</strong> {!! nl2br(e($criatura->componentes_alquimia)) !!}</p>
            <p><strong>Conhecimento:</strong> {!! nl2br(e($criatura->conhecimento)) !!}</p>
            <p><strong>Benefícios:</strong> {!! nl2br(e($criatura->beneficios_temporarios)) !!}</p>
        </div>

        <div class="ficha-section">
            <h2 class="titulo-centralizado">Notas Finais</h2>
            <p><strong>Notas:</strong> {!! nl2br(e($criatura->notas_opcionais)) !!}</p>
            <p><strong>Variantes:</strong> {!! nl2br(e($criatura->habilidades_variantes)) !!}</p>
            <p><strong>Evolução:</strong> {!! nl2br(e($criatura->evolucao)) !!}</p>
            <p><strong>Impacto Ambiental:</strong> {!! nl2br(e($criatura->impacto_ambiente)) !!}</p>
        </div>
    </div>

    <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('criaturas.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>
    
    <form action="{{ route('criaturas.edit', $criatura->id) }}" method="GET">
        <button type="submit" class="sidebar-btn btn-atualizar">Editar Criatura</button>
    </form>

    <form action="{{ route('criaturas.destroy', $criatura->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este equipamento?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="sidebar-btn btn-excluir">Excluir Criatura</button>
    </form>

    </div>

</div>
@endsection

