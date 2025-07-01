<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Guia RPG</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
  <div class="sidebar">
    <div class="sidebar-content">
      <h2>Guia RPG</h2>

      <label class="filter-label" for="category-select">Filtrar por tipo:</label>
      <select id="category-select" class="filter-select" onchange="filtrar()">
        <option value="todos">Todos</option>
        <option value="player">Players</option>
        <option value="equipamento">Equipamentos</option>
        <option value="magia">Magias</option>
        <option value="criatura">Criaturas</option>
        <option value="habilidade">Habilidades</option>
        <option value="cenario">Cenário</option>
      </select>

      <label class="filter-label" for="search-input">Buscar por nome:</label>
      <input type="text" id="search-input" class="search-input" placeholder="Ex: Espada" oninput="filtrar()">

      <a href="{{ route('players.index') }}" class="nav-link">🌹 Players</a>
      <a href="{{ route('equipamentos.index') }}" class="nav-link">⚔️ Equipamentos</a>
      <a href="#" class="nav-link">🔥 Magias</a>
      <a href="{{ route('criaturas.index') }}" class="nav-link">🐉 Criaturas</a>
      <a href="#" class="nav-link">🎯 Habilidades</a>
      <a href="#" class="nav-link">🌍 Cenário</a>
    </div>
    
    @if(session('success'))
      <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
      </div>
    @endif

    <div class="sidebar-content">
      <a href="{{ route('criaturas.exportarSeeder') }}" class="nav-link">💾 Exportar Seeder</a>
      <a href="{{ route('importar.seeder') }}" class="nav-link">📥 Importar Seeder</a>
    </div>

    <div class="author">
      Autor: <strong>Frost Salazar</strong>
    </div>
  </div>

  <div class="main">
    <div class="title">Itens Criados</div>
    <div class="cards" id="cards-container">
      {{-- Criaturas --}}
      @foreach ($criaturas as $criatura)
        <a href="{{ route('criaturas.show', $criatura->id) }}" class="card"
           data-type="criatura" data-name="{{ strtolower($criatura->nome) }}" style="text-decoration: none; color: inherit;">
          <h3>{{ $criatura->nome }}</h3>
          @if ($criatura->imagem)
            <img src="{{ asset('storage/' . $criatura->imagem) }}" alt="Imagem de {{ $criatura->nome }}">
          @else
            <img src="{{ asset('Assets/character.png') }}" alt="Imagem padrão do item">
          @endif
          <p>Tipo: {{ $criatura->tipo ?? 'Criatura' }}</p>
        </a>
      @endforeach

      {{-- Equipamentos --}}
      @foreach ($equipamentos as $equipamento)
        <a href="{{ route('equipamentos.show', $equipamento->id) }}" class="card"
           data-type="equipamento" data-name="{{ strtolower($equipamento->nome) }}" style="text-decoration: none; color: inherit;">
          <h3>{{ $equipamento->nome }}</h3>
          @if ($equipamento->imagem)
            <img src="{{ asset('storage/' . $equipamento->imagem) }}" alt="Imagem de {{ $equipamento->nome }}">
          @else
            <img src="{{ asset('Assets/item.png') }}" alt="Imagem padrão do equipamento">
          @endif
          <p>Tipo: {{ $equipamento->categoria ?? 'Equipamento' }}</p>
        </a>
      @endforeach

      {{-- Players --}}
      @foreach ($players as $player)
        <a href="{{ route('players.show', $player->id) }}" class="card"
          data-type="player" data-name="{{ strtolower($player->nome) }}" style="text-decoration: none; color: inherit;">
          <h3>{{ $player->nome }}</h3>
          @if ($player->imagem)
            <img src="{{ asset('storage/' . $player->imagem) }}" alt="Imagem de {{ $player->nome }}">
          @else
            <img src="{{ asset('Assets/character.png') }}" alt="Imagem padrão do player">
          @endif
          <p>Classe: {{ $player->classe ?? 'Player' }}</p>
        </a>
      @endforeach

    </div>
  </div>

  <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
