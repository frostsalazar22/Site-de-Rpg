@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Editar Habilidade: {{ $habilidade->nome }}</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-editar-habilidade" action="{{ route('habilidades.update', $habilidade->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem:">
            <input type="file" name="imagem">
            @if($habilidade->imagem)
              <br>
              <img src="{{ asset('storage/' . $habilidade->imagem) }}" alt="Imagem da habilidade" style="max-width: 150px; margin-top: 8px;">
            @endif
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" value="{{ old('nome', $habilidade->nome) }}" required>
          </label>

          <label data-label="Tipo:">
            <input type="text" name="tipo" value="{{ old('tipo', $habilidade->tipo) }}">
          </label>

          <label data-label="Classe Usuário:">
            <input type="text" name="classe_usuario" value="{{ old('classe_usuario', $habilidade->classe_usuario) }}">
          </label>

          <label data-label="Nível Necessário:">
            <input type="number" name="nivel_necessario" value="{{ old('nivel_necessario', $habilidade->nivel_necessario) }}">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Efeitos</h2>

          <label data-label="Descrição:">
            <textarea name="descricao" required>{{ old('descricao', $habilidade->descricao) }}</textarea>
          </label>

          <label data-label="Dano ou Benefício:">
            <input type="text" name="dano_beneficio" value="{{ old('dano_beneficio', $habilidade->dano_beneficio) }}">
          </label>

          <label data-label="Área de Ação:">
            <input type="text" name="area_acao" value="{{ old('area_acao', $habilidade->area_acao) }}">
          </label>

          <label data-label="Duração:">
            <input type="text" name="duracao" value="{{ old('duracao', $habilidade->duracao) }}">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Detalhes Avançados</h2>

          <label data-label="Condições de Ativação:">
            <textarea name="condicoes_ativacao">{{ old('condicoes_ativacao', $habilidade->condicoes_ativacao) }}</textarea>
          </label>

          <label data-label="Interações:">
            <textarea name="interacoes">{{ old('interacoes', $habilidade->interacoes) }}</textarea>
          </label>

          <label data-label="Aprimoramentos:">
            <textarea name="aprimoramentos">{{ old('aprimoramentos', $habilidade->aprimoramentos) }}</textarea>
          </label>

          <label data-label="Restrições:">
            <textarea name="restricoes">{{ old('restricoes', $habilidade->restricoes) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Riscos e Consequências</h2>

          <label data-label="Custo Adicional:">
            <input type="text" name="custo_adicional" value="{{ old('custo_adicional', $habilidade->custo_adicional) }}">
          </label>

          <label data-label="Falha:">
            <textarea name="falha">{{ old('falha', $habilidade->falha) }}</textarea>
          </label>

          <label data-label="Contraindicações:">
            <textarea name="contraindicacoes">{{ old('contraindicacoes', $habilidade->contraindicacoes) }}</textarea>
          </label>
        </div>

      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('habilidades.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <button type="submit" form="form-editar-habilidade" class="sidebar-btn btn-atualizar">Salvar Habilidade</button>
  </div>
</div>
@endsection
