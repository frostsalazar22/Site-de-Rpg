@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Registrar Novo Equipamento</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form form="form-criar-equipamento" action="{{ route('equipamentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Informações Básicas</h2>

          <label data-label="Imagem:">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" required>
          </label>

          <label data-label="Categoria:">
            <input type="text" name="categoria">
          </label>

          <label data-label="Tipo de Uso:">
            <input type="text" name="tipo_uso">
          </label>

          <label data-label="Classe Necessária:">
            <input type="text" name="classe_necessaria">
          </label>

          <label data-label="Requisitos:">
            <textarea name="requisitos" placeholder="Ex: Força 14, Nível 5"></textarea>
          </label>

          <label data-label="Peso:">
            <input type="number" step="0.1" name="peso">
          </label>

          <label data-label="Local de Origem:">
            <input type="text" name="local_origem">
          </label>

          <label data-label="Bônus:">
            <textarea name="bonus" placeholder="Ex: +2 Ataque, +1 Defesa"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Habilidades</h2>

          <label data-label="Habilidades Passivas:">
            <textarea name="habilidades_passivas"></textarea>
          </label>

          <label data-label="Habilidades Ativas:">
            <textarea name="habilidades_ativas"></textarea>
          </label>

          <label data-label="Durabilidade:">
            <input type="number" name="durabilidade">
          </label>

          <label data-label="Afinidade Elemental:">
            <input type="text" name="afinidade_elemental">
          </label>

          <label data-label="Encantamentos:">
            <textarea name="encantamentos"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">História e Conexões</h2>

          <label data-label="História:">
            <textarea name="historia"></textarea>
          </label>

          <label data-label="Curiosidades:">
            <textarea name="curiosidades"></textarea>
          </label>

          <label data-label="Conexões:">
            <textarea name="conexoes"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Outros Detalhes</h2>

          <label data-label="Preço:">
            <input type="number" name="preco">
          </label>

          <label data-label="Raridade:">
            <input type="text" name="raridade" placeholder="Comum, Raro, Lendário...">
          </label>

          <label data-label="Restrição de Uso:">
            <textarea name="restricao_uso"></textarea>
          </label>

          <label data-label="Evoluções:">
            <textarea name="evolucoes"></textarea>
          </label>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Salvar Equipamento</button>
      </form>
    </div>
  </div>

    <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('equipamentos.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <button type="submit" form="form-criar-equipamento" class="sidebar-btn btn-atualizar">Atualizar Equipamento</button>
    </div>

</div>
@endsection
