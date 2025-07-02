@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Registrar Nova Habilidade</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-criar-habilidade" action="{{ route('habilidades.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem:">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" required value="{{ old('nome') }}">
          </label>

          <label data-label="Tipo:">
            <input type="text" name="tipo" value="{{ old('tipo') }}">
          </label>

          <label data-label="Classe Usuário:">
            <input type="text" name="classe_usuario" value="{{ old('classe_usuario') }}">
          </label>

          <label data-label="Nível Necessário:">
            <input type="number" name="nivel_necessario" value="{{ old('nivel_necessario') }}">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Efeitos</h2>

          <label data-label="Descrição:">
            <textarea name="descricao" required>{{ old('descricao') }}</textarea>
          </label>

          <label data-label="Dano ou Benefício:">
            <input type="text" name="dano_beneficio" value="{{ old('dano_beneficio') }}">
          </label>

          <label data-label="Área de Ação:">
            <input type="text" name="area_acao" value="{{ old('area_acao') }}">
          </label>

          <label data-label="Duração:">
            <input type="text" name="duracao" value="{{ old('duracao') }}">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Detalhes Avançados</h2>

          <label data-label="Condições de Ativação:">
            <textarea name="condicoes_ativacao">{{ old('condicoes_ativacao') }}</textarea>
          </label>

          <label data-label="Interações:">
            <textarea name="interacoes">{{ old('interacoes') }}</textarea>
          </label>

          <label data-label="Aprimoramentos:">
            <textarea name="aprimoramentos">{{ old('aprimoramentos') }}</textarea>
          </label>

          <label data-label="Restrições:">
            <textarea name="restricoes">{{ old('restricoes') }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Riscos e Consequências</h2>

          <label data-label="Custo Adicional:">
            <input type="text" name="custo_adicional" value="{{ old('custo_adicional') }}">
          </label>

          <label data-label="Falha:">
            <textarea name="falha">{{ old('falha') }}</textarea>
          </label>

          <label data-label="Contraindicações:">
            <textarea name="contraindicacoes">{{ old('contraindicacoes') }}</textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('habilidades.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <button type="submit" form="form-criar-habilidade" class="sidebar-btn btn-atualizar">Salvar Habilidade</button>
  </div>
</div>
@endsection
