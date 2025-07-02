@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Editar Magia: {{ $magia->nome }}</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-editar-magia" action="{{ route('magias.update', $magia->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem Atual:">
            @if($magia->imagem)
              <img src="{{ asset('storage/' . $magia->imagem) }}" alt="Imagem Atual" style="max-width: 150px; display: block; margin-bottom: 10px;">
            @else
              <p>Sem imagem</p>
            @endif
          </label>

          <label data-label="Nova Imagem (opcional):">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" value="{{ old('nome', $magia->nome) }}" required>
          </label>

          <label data-label="Escola:">
            <input type="text" name="escola" value="{{ old('escola', $magia->escola) }}" required>
          </label>

          <label data-label="Nível:">
            <input type="number" name="nivel" min="0" max="9" value="{{ old('nivel', $magia->nivel) }}" required>
          </label>

          <label data-label="Classe Usuário:">
            <input type="text" name="classe_usuario" value="{{ old('classe_usuario', $magia->classe_usuario) }}" required>
          </label>

          <label data-label="Verbal (Requer palavras mágicas):">
            <select name="verbais" required>
              <option value="0" @if(old('verbais', $magia->verbais) == 0) selected @endif>Não</option>
              <option value="1" @if(old('verbais', $magia->verbais) == 1) selected @endif>Sim</option>
            </select>
          </label>

          <label data-label="Somático (Requer gestos):">
            <select name="somaticos" required>
              <option value="0" @if(old('somaticos', $magia->somaticos) == 0) selected @endif>Não</option>
              <option value="1" @if(old('somaticos', $magia->somaticos) == 1) selected @endif>Sim</option>
            </select>
          </label>

          <label data-label="Materiais (Itens necessários):">
            <textarea name="materiais" placeholder="Ex: Penas de corvo, pó de fada">{{ old('materiais', $magia->materiais) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Efeitos</h2>

          <label data-label="Área de Efeito:">
            <input type="text" name="area_efeito" value="{{ old('area_efeito', $magia->area_efeito) }}" placeholder="Ex: 20 metros de raio">
          </label>

          <label data-label="Duração:">
            <input type="text" name="duracao" value="{{ old('duracao', $magia->duracao) }}" placeholder="Ex: Instantâneo, 1 minuto">
          </label>

          <label data-label="Descrição:">
            <textarea name="descricao" required>{{ old('descricao', $magia->descricao) }}</textarea>
          </label>

          <label data-label="Dano ou Benefício:">
            <input type="text" name="dano_beneficio" value="{{ old('dano_beneficio', $magia->dano_beneficio) }}" placeholder="Ex: 6d6 de dano">
          </label>

          <label data-label="Alvo:">
            <input type="text" name="alvo" value="{{ old('alvo', $magia->alvo) }}" placeholder="Ex: Uma criatura">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Características Especiais</h2>

          <label data-label="Ritual (Pode ser lançado como ritual):">
            <select name="ritual" required>
              <option value="0" @if(old('ritual', $magia->ritual) == 0) selected @endif>Não</option>
              <option value="1" @if(old('ritual', $magia->ritual) == 1) selected @endif>Sim</option>
            </select>
          </label>

          <label data-label="Resistência:">
            <textarea name="resistencia" placeholder="Ex: Sabedoria CD 15">{{ old('resistencia', $magia->resistencia) }}</textarea>
          </label>

          <label data-label="Interrupções:">
            <input type="text" name="interrupcoes" value="{{ old('interrupcoes', $magia->interrupcoes) }}" placeholder="Ex: Falha com distração">
          </label>

          <label data-label="Aprimoramento (Níveis superiores):">
            <textarea name="aprimoramento">{{ old('aprimoramento', $magia->aprimoramento) }}</textarea>
          </label>

          <label data-label="Custo de Conjuração:">
            <input type="text" name="custo_conjuracao" value="{{ old('custo_conjuracao', $magia->custo_conjuracao) }}" placeholder="Ex: Sacrifício de PV">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Falhas e Contraindicações</h2>

          <label data-label="Falhas Críticas:">
            <textarea name="falhas_criticas">{{ old('falhas_criticas', $magia->falhas_criticas) }}</textarea>
          </label>

          <label data-label="Contraindicações:">
            <textarea name="contraindicacoes">{{ old('contraindicacoes', $magia->contraindicacoes) }}</textarea>
          </label>

          <label data-label="Variações Regionais:">
            <textarea name="variacoes_regionais">{{ old('variacoes_regionais', $magia->variacoes_regionais) }}</textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('magias.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <a href="{{ route('magias.show', $magia->id) }}" class="sidebar-btn btn-visualizar">Visualizar Magia</a>

    <form action="{{ route('magias.destroy', $magia->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta magia?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="sidebar-btn btn-excluir">Excluir Magia</button>
    </form>

    <button type="submit" form="form-editar-magia" class="sidebar-btn btn-atualizar">Atualizar Magia</button>
  </div>
</div>
@endsection
