@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Registrar Novo Player</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-criar-player" action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Identificação --}}
        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem:">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" required>
          </label>

          <label data-label="Raça:">
            <input type="text" name="raca">
          </label>

          <label data-label="Classe:">
            <input type="text" name="classe">
          </label>

          <label data-label="Alinhamento:">
            <input type="text" name="alinhamento">
          </label>

          <label data-label="Idade:">
            <input type="number" name="idade">
          </label>

          <label data-label="Gênero:">
            <input type="text" name="genero">
          </label>

          <label data-label="Altura:">
            <input type="text" name="altura">
          </label>

          <label data-label="Peso:">
            <input type="text" name="peso">
          </label>

          <label data-label="Aparência:">
            <textarea name="aparencia"></textarea>
          </label>
        </div>

        {{-- Atributos --}}
        <div class="ficha-section atributos">
          <h2 class="titulo-centralizado">Atributos</h2>
          <div class="atributos-grid">
            @foreach (['forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma'] as $atributo)
              <div>
                <label>{{ strtoupper($atributo) }}:</label>
                <input type="number" name="{{ $atributo }}">
              </div>
            @endforeach
          </div>

          <label data-label="Pontos de Vida (Máx):">
            <input type="number" name="pontos_vida_max">
          </label>

          <label data-label="Pontos de Vida (Atual):">
            <input type="number" name="pontos_vida_atual">
          </label>

          <label data-label="Classe de Armadura:">
            <input type="number" name="classe_armadura">
          </label>

          <label data-label="Iniciativa:">
            <input type="number" name="iniciativa">
          </label>

          <label data-label="Velocidade:">
            <input type="text" name="velocidade">
          </label>
        </div>

        {{-- Habilidades e Magias --}}
        <div class="ficha-section">
          <h2 class="titulo-centralizado">Habilidades e Magias</h2>

          <label data-label="Habilidades Passivas:">
            <textarea name="habilidades_passivas"></textarea>
          </label>

          <label data-label="Habilidades Ativas:">
            <textarea name="habilidades_ativas"></textarea>
          </label>

          <label data-label="Magias Conhecidas:">
            <textarea name="magias_conhecidas"></textarea>
          </label>

          <label data-label="Slots de Magia:">
            <textarea name="slots_magia"></textarea>
          </label>

          <label data-label="Magias Preparadas:">
            <textarea name="magias_preparadas"></textarea>
          </label>

          <label data-label="Talentos e Proficiências:">
            <textarea name="talentos_proficiências"></textarea>
          </label>
        </div>

        {{-- Inventário --}}
        <div class="ficha-section">
          <h2 class="titulo-centralizado">Inventário</h2>

          <label data-label="Equipamentos Básicos:">
            <textarea name="equipamentos_basicos"></textarea>
          </label>

          <label data-label="Itens Utilizáveis:">
            <textarea name="itens_utilizaveis"></textarea>
          </label>

          <label data-label="Recursos:">
            <textarea name="recursos"></textarea>
          </label>
        </div>

        {{-- Personalidade --}}
        <div class="ficha-section">
          <h2 class="titulo-centralizado">Personalidade</h2>

          <label data-label="Motivações:">
            <textarea name="motivacoes"></textarea>
          </label>

          <label data-label="Medos e Fraquezas:">
            <textarea name="medos_fraquezas"></textarea>
          </label>

          <label data-label="Traços de Personalidade:">
            <textarea name="traços_personalidade"></textarea>
          </label>

          <label data-label="Ideais:">
            <textarea name="ideais"></textarea>
          </label>

          <label data-label="Vínculos:">
            <textarea name="vinculos"></textarea>
          </label>

          <label data-label="Defeitos:">
            <textarea name="defeitos"></textarea>
          </label>
        </div>

        {{-- História --}}
        <div class="ficha-section">
          <h2 class="titulo-centralizado">História</h2>

          <label data-label="Background:">
            <textarea name="background"></textarea>
          </label>

          <label data-label="Eventos Marcantes:">
            <textarea name="eventos_marcantes"></textarea>
          </label>

          <label data-label="Conexões:">
            <textarea name="conexoes"></textarea>
          </label>

          <label data-label="Segredos:">
            <textarea name="segredos"></textarea>
          </label>
        </div>

        {{-- Combate --}}
        <div class="ficha-section">
          <h2 class="titulo-centralizado">Estatísticas de Combate</h2>

          <label data-label="Ataques e Magias:">
            <textarea name="ataques_magias"></textarea>
          </label>

          <label data-label="Resistências:">
            <textarea name="resistencias"></textarea>
          </label>

          <label data-label="Fraquezas:">
            <textarea name="fraquezas"></textarea>
          </label>

          <label data-label="Testes de Resistência:">
            <textarea name="testes_resistencia"></textarea>
          </label>
        </div>

        {{-- Notas Finais --}}
        <div class="ficha-section">
          <h2 class="titulo-centralizado">Notas Finais</h2>

          <label data-label="Frases de Efeito:">
            <textarea name="frases_efeito"></textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('players.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <button type="submit" form="form-criar-player" class="sidebar-btn btn-atualizar">Salvar Player</button>
  </div>
</div>
@endsection
