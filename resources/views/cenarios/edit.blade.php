@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Editar Cenário: {{ $cenario->nome }}</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-editar-cenario" action="{{ route('cenarios.update', $cenario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem Atual:">
            @if($cenario->imagem)
              <img src="{{ asset('storage/' . $cenario->imagem) }}" alt="Imagem Atual" style="max-width: 150px; display: block; margin-bottom: 10px;">
            @else
              <p>Sem imagem</p>
            @endif
          </label>

          <label data-label="Nova Imagem (opcional):">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" value="{{ old('nome', $cenario->nome) }}" required>
          </label>

          <label data-label="Tipo:">
            <input type="text" name="tipo" value="{{ old('tipo', $cenario->tipo) }}">
          </label>

          <label data-label="Ambientacão:">
            <input type="text" name="ambientacao" value="{{ old('ambientacao', $cenario->ambientacao) }}">
          </label>

          <label data-label="Período Temporal:">
            <input type="text" name="periodo_temporal" value="{{ old('periodo_temporal', $cenario->periodo_temporal) }}">
          </label>
        </div>

        @foreach ([
          'Geografia e Ambiente' => ['descricao_fisica', 'clima', 'recursos_naturais', 'locais_importantes'],
          'População e Cultura' => ['racas_especies', 'sociedade', 'crencas_religiao', 'linguas_costumes'],
          'História e Política' => ['eventos_importantes', 'conflitos_atuais', 'lideres_personagens', 'aliancas_inimizades'],
          'Magia e Tecnologia' => ['nivel_tecnologico', 'presenca_magia', 'instituicoes_magicas_cientificas'],
          'Ameaças e Desafios' => ['inimigos_comuns', 'perigos_naturais', 'conflitos_internos', 'misterios_segredos'],
          'Exploração e Interação' => ['locais_aventuras', 'npcs_importantes', 'recursos_jogadores', 'recompensas_tesouros']
        ] as $secao => $campos)
          <div class="ficha-section">
            <h2 class="titulo-centralizado">{{ $secao }}</h2>
            @foreach ($campos as $campo)
              <label data-label="{{ ucwords(str_replace('_', ' ', $campo)) }}:">
                @if (in_array($campo, ['clima', 'nivel_tecnologico', 'presenca_magia']))
                  <input type="text" name="{{ $campo }}" value="{{ old($campo, $cenario->$campo) }}">
                @else
                  <textarea name="{{ $campo }}">{{ old($campo, $cenario->$campo) }}</textarea>
                @endif
              </label>
            @endforeach
          </div>
        @endforeach
      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>
    <a href="{{ route('cenarios.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>
    <a href="{{ route('cenarios.show', $cenario->id) }}" class="sidebar-btn btn-visualizar">Visualizar Cenário</a>

    <form action="{{ route('cenarios.destroy', $cenario->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este cenário?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="sidebar-btn btn-excluir">Excluir Cenário</button>
    </form>

    <button type="submit" form="form-editar-cenario" class="sidebar-btn btn-atualizar">Atualizar Cenário</button>
  </div>
</div>
@endsection
