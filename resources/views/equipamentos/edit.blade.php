@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Editar Equipamento: {{ $equipamento->nome }}</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-editar-equipamento" action="{{ route('equipamentos.update', $equipamento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Imagem</h2>

          <label data-label="Imagem Atual:">
            @if($equipamento->imagem)
              <img src="{{ asset('storage/' . $equipamento->imagem) }}" alt="Imagem Atual" style="max-width: 150px; display: block; margin-bottom: 10px;">
            @else
              <p>Sem imagem</p>
            @endif
          </label>

          <label data-label="Nova Imagem (opcional):">
            <input type="file" name="imagem">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Informações Básicas</h2>

          <label data-label="Nome:">
            <input type="text" name="nome" value="{{ old('nome', $equipamento->nome) }}" required>
          </label>

          <label data-label="Categoria:">
            <input type="text" name="categoria" value="{{ old('categoria', $equipamento->categoria) }}">
          </label>

          <label data-label="Tipo de Uso:">
            <input type="text" name="tipo_uso" value="{{ old('tipo_uso', $equipamento->tipo_uso) }}">
          </label>

          <label data-label="Classe Necessária:">
            <input type="text" name="classe_necessaria" value="{{ old('classe_necessaria', $equipamento->classe_necessaria) }}">
          </label>

          <label data-label="Requisitos:">
            <textarea name="requisitos">{{ old('requisitos', $equipamento->requisitos) }}</textarea>
          </label>

          <label data-label="Peso:">
            <input type="number" step="0.1" name="peso" value="{{ old('peso', $equipamento->peso) }}">
          </label>

          <label data-label="Local de Origem:">
            <input type="text" name="local_origem" value="{{ old('local_origem', $equipamento->local_origem) }}">
          </label>

          <label data-label="Bônus:">
            <textarea name="bonus">{{ old('bonus', $equipamento->bonus) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Habilidades</h2>

          <label data-label="Habilidades Passivas:">
            <textarea name="habilidades_passivas">{{ old('habilidades_passivas', $equipamento->habilidades_passivas) }}</textarea>
          </label>

          <label data-label="Habilidades Ativas:">
            <textarea name="habilidades_ativas">{{ old('habilidades_ativas', $equipamento->habilidades_ativas) }}</textarea>
          </label>

          <label data-label="Durabilidade:">
            <input type="number" name="durabilidade" value="{{ old('durabilidade', $equipamento->durabilidade) }}">
          </label>

          <label data-label="Afinidade Elemental:">
            <input type="text" name="afinidade_elemental" value="{{ old('afinidade_elemental', $equipamento->afinidade_elemental) }}">
          </label>

          <label data-label="Encantamentos:">
            <textarea name="encantamentos">{{ old('encantamentos', $equipamento->encantamentos) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">História e Conexões</h2>

          <label data-label="História:">
            <textarea name="historia">{{ old('historia', $equipamento->historia) }}</textarea>
          </label>

          <label data-label="Curiosidades:">
            <textarea name="curiosidades">{{ old('curiosidades', $equipamento->curiosidades) }}</textarea>
          </label>

          <label data-label="Conexões:">
            <textarea name="conexoes">{{ old('conexoes', $equipamento->conexoes) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Outros Detalhes</h2>

          <label data-label="Preço:">
            <input type="number" name="preco" value="{{ old('preco', $equipamento->preco) }}">
          </label>

          <label data-label="Raridade:">
            <input type="text" name="raridade" value="{{ old('raridade', $equipamento->raridade) }}">
          </label>

          <label data-label="Restrição de Uso:">
            <textarea name="restricao_uso">{{ old('restricao_uso', $equipamento->restricao_uso) }}</textarea>
          </label>

          <label data-label="Evoluções:">
            <textarea name="evolucoes">{{ old('evolucoes', $equipamento->evolucoes) }}</textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

    <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('equipamentos.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <a href="{{ route('equipamentos.show', $equipamento->id) }}" class="sidebar-btn btn-visualizar">Visualizar Equipamento</a>

    <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este equipamento?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="sidebar-btn btn-excluir">Excluir Equipamento</button>
    </form>

    <button type="submit" form="form-editar-equipamento" class="sidebar-btn btn-atualizar">Atualizar Equipamento</button>
    </div>

</div>
@endsection
