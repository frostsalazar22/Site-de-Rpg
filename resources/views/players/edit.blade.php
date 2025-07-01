@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Editar Player: {{ $player->nome }}</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-editar-player" action="{{ route('players.update', $player->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Imagem</h2>

          <label data-label="Imagem Atual:">
            @if($player->imagem)
              <img src="{{ asset('storage/' . $player->imagem) }}" alt="Imagem Atual" style="max-width: 150px; display: block; margin-bottom: 10px;">
            @else
              <p>Sem imagem</p>
            @endif
          </label>

          <label data-label="Nova Imagem (opcional):">
            <input type="file" name="imagem">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          @foreach ([
            'nome', 'raca', 'classe', 'alinhamento', 'idade', 'genero',
            'altura', 'peso', 'aparencia'
          ] as $campo)
            <label data-label="{{ ucfirst(str_replace('_', ' ', $campo)) }}:">
              @if($campo === 'aparencia')
                <textarea name="{{ $campo }}">{{ old($campo, $player->$campo) }}</textarea>
              @else
                <input type="{{ $campo === 'idade' ? 'number' : 'text' }}" name="{{ $campo }}" value="{{ old($campo, $player->$campo) }}">
              @endif
            </label>
          @endforeach
        </div>

        <div class="ficha-section atributos">
          <h2 class="titulo-centralizado">Atributos</h2>
          <div class="atributos-grid">
            @foreach ([
              'forca', 'destreza', 'constituicao',
              'inteligencia', 'sabedoria', 'carisma'
            ] as $atributo)
              <div>
                <label>{{ ucfirst($atributo) }}:</label>
                <input type="number" name="{{ $atributo }}" value="{{ old($atributo, $player->$atributo) }}">
              </div>
            @endforeach
          </div>

          @foreach ([
            'pontos_vida_max', 'pontos_vida_atual',
            'classe_armadura', 'iniciativa', 'velocidade'
          ] as $campo)
            <label data-label="{{ ucfirst(str_replace('_', ' ', $campo)) }}:">
              <input type="{{ $campo === 'velocidade' ? 'text' : 'number' }}" name="{{ $campo }}" value="{{ old($campo, $player->$campo) }}">
            </label>
          @endforeach
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Habilidades e Poderes</h2>

          @foreach ([
            'habilidades_passivas', 'habilidades_ativas', 'magias_conhecidas',
            'slots_magia', 'magias_preparadas', 'talentos_proficiências'
          ] as $campo)
            <label data-label="{{ ucfirst(str_replace('_', ' ', $campo)) }}:">
              <textarea name="{{ $campo }}">{{ old($campo, $player->$campo) }}</textarea>
            </label>
          @endforeach
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Inventário</h2>

          @foreach ([
            'equipamentos_basicos', 'itens_utilizaveis', 'recursos'
          ] as $campo)
            <label data-label="{{ ucfirst(str_replace('_', ' ', $campo)) }}:">
              <textarea name="{{ $campo }}">{{ old($campo, $player->$campo) }}</textarea>
            </label>
          @endforeach
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Personalidade</h2>

          @foreach ([
            'motivacoes', 'medos_fraquezas', 'traços_personalidade',
            'ideais', 'vinculos', 'defeitos'
          ] as $campo)
            <label data-label="{{ ucfirst(str_replace('_', ' ', $campo)) }}:">
              <textarea name="{{ $campo }}">{{ old($campo, $player->$campo) }}</textarea>
            </label>
          @endforeach
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">História</h2>

          @foreach ([
            'background', 'eventos_marcantes', 'conexoes', 'segredos'
          ] as $campo)
            <label data-label="{{ ucfirst(str_replace('_', ' ', $campo)) }}:">
              <textarea name="{{ $campo }}">{{ old($campo, $player->$campo) }}</textarea>
            </label>
          @endforeach
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Estatísticas de Combate</h2>

          @foreach ([
            'ataques_magias', 'resistencias', 'fraquezas', 'testes_resistencia'
          ] as $campo)
            <label data-label="{{ ucfirst(str_replace('_', ' ', $campo)) }}:">
              <textarea name="{{ $campo }}">{{ old($campo, $player->$campo) }}</textarea>
            </label>
          @endforeach
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Notas Finais</h2>

          <label data-label="Frases de Efeito:">
            <textarea name="frases_efeito">{{ old('frases_efeito', $player->frases_efeito) }}</textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('players.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <a href="{{ route('players.show', $player->id) }}" class="sidebar-btn btn-visualizar">Visualizar Player</a>

    <form action="{{ route('players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este player?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="sidebar-btn btn-excluir">Excluir Player</button>
    </form>

    <button type="submit" form="form-editar-player" class="sidebar-btn btn-atualizar">Atualizar Player</button>
  </div>
</div>
@endsection
