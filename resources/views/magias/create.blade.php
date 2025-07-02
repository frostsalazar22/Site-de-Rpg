@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Registrar Nova Magia</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-criar-magia" action="{{ route('magias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem:">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" required>
          </label>

          <label data-label="Escola:">
            <input type="text" name="escola" required>
          </label>

          <label data-label="Nível:">
            <input type="number" name="nivel" min="0" max="9" required>
          </label>

          <label data-label="Classe Usuário:">
            <input type="text" name="classe_usuario" required>
          </label>

          <label data-label="Verbal (Requer palavras mágicas):">
            <select name="verbais" required>
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
          </label>

          <label data-label="Somático (Requer gestos):">
            <select name="somaticos" required>
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
          </label>

          <label data-label="Materiais (Itens necessários):">
            <textarea name="materiais" placeholder="Ex: Penas de corvo, pó de fada"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Efeitos</h2>

          <label data-label="Área de Efeito:">
            <input type="text" name="area_efeito" placeholder="Ex: 20 metros de raio">
          </label>

          <label data-label="Duração:">
            <input type="text" name="duracao" placeholder="Ex: Instantâneo, 1 minuto">
          </label>

          <label data-label="Descrição:">
            <textarea name="descricao" required></textarea>
          </label>

          <label data-label="Dano ou Benefício:">
            <input type="text" name="dano_beneficio" placeholder="Ex: 6d6 de dano">
          </label>

          <label data-label="Alvo:">
            <input type="text" name="alvo" placeholder="Ex: Uma criatura">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Características Especiais</h2>

          <label data-label="Ritual (Pode ser lançado como ritual):">
            <select name="ritual" required>
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
          </label>

          <label data-label="Resistência:">
            <textarea name="resistencia" placeholder="Ex: Sabedoria CD 15"></textarea>
          </label>

          <label data-label="Interrupções:">
            <input type="text" name="interrupcoes" placeholder="Ex: Falha com distração">
          </label>

          <label data-label="Aprimoramento (Níveis superiores):">
            <textarea name="aprimoramento"></textarea>
          </label>

          <label data-label="Custo de Conjuração:">
            <input type="text" name="custo_conjuracao" placeholder="Ex: Sacrifício de PV">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Falhas e Contraindicações</h2>

          <label data-label="Falhas Críticas:">
            <textarea name="falhas_criticas"></textarea>
          </label>

          <label data-label="Contraindicações:">
            <textarea name="contraindicacoes"></textarea>
          </label>

          <label data-label="Variações Regionais:">
            <textarea name="variacoes_regionais"></textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('magias.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <button type="submit" form="form-criar-magia" class="sidebar-btn btn-atualizar">Salvar Magia</button>
  </div>
</div>
@endsection
