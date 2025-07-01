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
        <option value="personagem">Personagens</option>
        <option value="equipamento">Equipamentos</option>
        <option value="magia">Magias</option>
        <option value="criatura">Criaturas</option>
        <option value="habilidade">Habilidade</option>
        <option value="cenario">Cenário</option>
      </select>

      <label class="filter-label" for="search-input">Buscar por nome:</label>
      <input type="text" id="search-input" class="search-input" placeholder="Ex: Espada" oninput="filtrar()">

      <a href="#" class="nav-link">🌹 Personagens</a>
      <a href="#" class="nav-link">⚔️ Equipamentos</a>
      <a href="#" class="nav-link">🔥 Magias</a>
      <a href="{{ route('criaturas.create') }}" class="nav-link">🐉 Criaturas</a>
      <a href="#" class="nav-link">🎯 Habilidades</a>
      <a href="#" class="nav-link">🌍 Cenário</a>
    </div>
    
    @if(session('success'))
      <div style="color: green; margin-bottom: 10px;">
        {{ session('success') }}
      </div>
    @endif

    <a href="{{ route('criaturas.exportarSeeder') }}" class="btn btn-warning" style="margin-bottom: 15px;">
        💾 Exportar Criaturas para Seeder
    </a>

    <div class="author">
      Autor: <strong>Frost Salazar</strong>
    </div>
  </div>

  <div class="main">
    <div class="title">Itens Criados</div>
    <div class="cards" id="cards-container">
      @foreach ($criaturas as $criatura)
        <a href="{{ route('criaturas.show', $criatura->id) }}" class="card"
           data-type="criatura" data-name="{{ $criatura->nome }}" style="text-decoration: none; color: inherit;">
          <h3>{{ $criatura->nome }}</h3>
          @if ($criatura->imagem)
            <img src="{{ asset('storage/' . $criatura->imagem) }}" alt="Imagem de {{ $criatura->nome }}">
          @else
            <img src="{{ asset('Assets/character.png') }}" alt="Imagem padrão do item">
          @endif
          <p>Tipo: {{ $criatura->tipo ?? 'Criatura' }}</p>
        </a>
      @endforeach
    </div>
  </div>

  <script src="{{ asset('js/home.js') }}"></script>
</body>
</html>
