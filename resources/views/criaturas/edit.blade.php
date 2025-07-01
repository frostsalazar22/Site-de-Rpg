@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Editar Criatura: {{ $criatura->nome }}</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-editar-criatura" action="{{ route('criaturas.update', $criatura->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem Atual:">
            @if($criatura->imagem)
              <img src="{{ asset('storage/' . $criatura->imagem) }}" alt="Imagem Atual" style="max-width: 150px; display: block; margin-bottom: 10px;">
            @else
              <p>Sem imagem</p>
            @endif
          </label>

          <label data-label="Nova Imagem (opcional):">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" value="{{ old('nome', $criatura->nome) }}" required>
          </label>

          <label data-label="Tipo:">
            <input type="text" name="tipo" value="{{ old('tipo', $criatura->tipo) }}">
          </label>

          <label data-label="Subtipo:">
            <input type="text" name="subtipo" value="{{ old('subtipo', $criatura->subtipo) }}">
          </label>

          <label data-label="Alinhamento:">
            <input type="text" name="alinhamento" value="{{ old('alinhamento', $criatura->alinhamento) }}">
          </label>

          <label data-label="Classe de Desafio:">
            <input type="text" name="classe_desafio" value="{{ old('classe_desafio', $criatura->classe_desafio) }}">
          </label>

          <label data-label="Categoria de Perigo:">
            <input type="text" name="categoria_perigo" value="{{ old('categoria_perigo', $criatura->categoria_perigo) }}">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Características Físicas</h2>

          <label data-label="Tamanho:">
            <input type="text" name="tamanho" value="{{ old('tamanho', $criatura->tamanho) }}">
          </label>

          <label data-label="Velocidade:">
            <input type="text" name="velocidade" value="{{ old('velocidade', $criatura->velocidade) }}">
          </label>

          <label data-label="Aparência:">
            <textarea name="aparencia">{{ old('aparencia', $criatura->aparencia) }}</textarea>
          </label>

          <label data-label="Peso e Altura:">
            <input type="text" name="peso_altura" value="{{ old('peso_altura', $criatura->peso_altura) }}">
          </label>

          <label data-label="Localização Preferida:">
            <input type="text" name="localizacao_preferida" value="{{ old('localizacao_preferida', $criatura->localizacao_preferida) }}">
          </label>

          <label data-label="Presença Ambiental:">
            <textarea name="presenca_ambiental">{{ old('presenca_ambiental', $criatura->presenca_ambiental) }}</textarea>
          </label>
        </div>

        <div class="ficha-section atributos">
          <h2 class="titulo-centralizado">Atributos</h2>
          <div class="atributos-grid">
            @foreach (['for', 'des', 'con', 'int', 'sab', 'car'] as $atributo)
              <div>
                <label>{{ strtoupper($atributo) }}:</label>
                <input type="number" name="{{ $atributo }}" value="{{ old($atributo, $criatura->$atributo) }}">
              </div>
            @endforeach
          </div>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Resistências</h2>

          <label data-label="Resistências:">
            <textarea name="resistencias" placeholder="Ex: Fogo, Veneno">{{ old('resistencias', $criatura->resistencias) }}</textarea>
          </label>

          <label data-label="Imunidades:">
            <textarea name="imunidades" placeholder="Ex: Sono, Controle Mental">{{ old('imunidades', $criatura->imunidades) }}</textarea>
          </label>

          <label data-label="Vulnerabilidades:">
            <textarea name="vulnerabilidades" placeholder="Ex: Gelo, Prata">{{ old('vulnerabilidades', $criatura->vulnerabilidades) }}</textarea>
          </label>

          <label data-label="Resistências Condicionais:">
            <textarea name="resistencias_condicionais">{{ old('resistencias_condicionais', $criatura->resistencias_condicionais) }}</textarea>
          </label>

          <label data-label="Descrição:">
            <textarea name="descricao">{{ old('descricao', $criatura->descricao) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Estatísticas de Combate</h2>

          <label data-label="PV:">
            <input type="text" name="pv" placeholder="Ex: 8d10+16" value="{{ old('pv', $criatura->pv) }}">
          </label>

          <label data-label="CA:">
            <input type="text" name="ca" placeholder="Classe de Armadura" value="{{ old('ca', $criatura->ca) }}">
          </label>

          <label data-label="Reações:">
            <textarea name="reacoes">{{ old('reacoes', $criatura->reacoes) }}</textarea>
          </label>

          <label data-label="Condições Infligidas:">
            <textarea name="condicoes_infligidas">{{ old('condicoes_infligidas', $criatura->condicoes_infligidas) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Ações</h2>

          <label data-label="Ataques Comuns:">
            <textarea name="ataques_comuns">{{ old('ataques_comuns', $criatura->ataques_comuns) }}</textarea>
          </label>

          <label data-label="Ações Especiais:">
            <textarea name="acoes_especiais">{{ old('acoes_especiais', $criatura->acoes_especiais) }}</textarea>
          </label>

          <label data-label="Ações Lendárias:">
            <textarea name="acoes_lendarias">{{ old('acoes_lendarias', $criatura->acoes_lendarias) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Comportamento e Lore</h2>

          <label data-label="Origem:">
            <textarea name="origem">{{ old('origem', $criatura->origem) }}</textarea>
          </label>

          <label data-label="Motivações:">
            <textarea name="motivacoes">{{ old('motivacoes', $criatura->motivacoes) }}</textarea>
          </label>

          <label data-label="Hábito Social:">
            <textarea name="habito_social">{{ old('habito_social', $criatura->habito_social) }}</textarea>
          </label>

          <label data-label="Mistérios:">
            <textarea name="misterios">{{ old('misterios', $criatura->misterios) }}</textarea>
          </label>

          <label data-label="Rotina:">
            <textarea name="rotina">{{ old('rotina', $criatura->rotina) }}</textarea>
          </label>

          <label data-label="Impacto no Mundo:">
            <textarea name="impacto_mundo">{{ old('impacto_mundo', $criatura->impacto_mundo) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Estágios</h2>

          <label data-label="Descrição Estágios:">
            <textarea name="descricao_estagios">{{ old('descricao_estagios', $criatura->descricao_estagios) }}</textarea>
          </label>

          <label data-label="Condições de Transição:">
            <textarea name="condicoes_transicao">{{ old('condicoes_transicao', $criatura->condicoes_transicao) }}</textarea>
          </label>

          <label data-label="Estágio 1:">
            <textarea name="estagio_1">{{ old('estagio_1', $criatura->estagio_1) }}</textarea>
          </label>

          <label data-label="Estágio 2:">
            <textarea name="estagio_2">{{ old('estagio_2', $criatura->estagio_2) }}</textarea>
          </label>

          <label data-label="Estágio 3:">
            <textarea name="estagio_3">{{ old('estagio_3', $criatura->estagio_3) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Habilidades</h2>

          <label data-label="Habilidades Passivas:">
            <textarea name="habilidades_passivas">{{ old('habilidades_passivas', $criatura->habilidades_passivas) }}</textarea>
          </label>

          <label data-label="Habilidades Ativas:">
            <textarea name="habilidades_ativas">{{ old('habilidades_ativas', $criatura->habilidades_ativas) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Interações Narrativas</h2>

          <label data-label="Influência no Jogo:">
            <textarea name="influencia_jogo">{{ old('influencia_jogo', $criatura->influencia_jogo) }}</textarea>
          </label>

          <label data-label="Conexões:">
            <textarea name="conexoes">{{ old('conexoes', $criatura->conexoes) }}</textarea>
          </label>

          <label data-label="Detalhes Cinemáticos:">
            <textarea name="detalhes_cinematicos">{{ old('detalhes_cinematicos', $criatura->detalhes_cinematicos) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Recompensas</h2>

          <label data-label="Tesouro:">
            <textarea name="tesouro">{{ old('tesouro', $criatura->tesouro) }}</textarea>
          </label>

          <label data-label="Componentes de Alquimia:">
            <textarea name="componentes_alquimia">{{ old('componentes_alquimia', $criatura->componentes_alquimia) }}</textarea>
          </label>

          <label data-label="Conhecimento:">
            <textarea name="conhecimento">{{ old('conhecimento', $criatura->conhecimento) }}</textarea>
          </label>

          <label data-label="Benefícios Temporários:">
            <textarea name="beneficios_temporarios">{{ old('beneficios_temporarios', $criatura->beneficios_temporarios) }}</textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Notas Finais</h2>

          <label data-label="Notas Opcionais:">
            <textarea name="notas_opcionais">{{ old('notas_opcionais', $criatura->notas_opcionais) }}</textarea>
          </label>

          <label data-label="Habilidades Variantes:">
            <textarea name="habilidades_variantes">{{ old('habilidades_variantes', $criatura->habilidades_variantes) }}</textarea>
          </label>

          <label data-label="Evolução:">
            <textarea name="evolucao">{{ old('evolucao', $criatura->evolucao) }}</textarea>
          </label>

          <label data-label="Impacto no Ambiente:">
            <textarea name="impacto_ambiente">{{ old('impacto_ambiente', $criatura->impacto_ambiente) }}</textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

    <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('criaturas.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <a href="{{ route('criaturas.show', $criatura->id) }}" class="sidebar-btn btn-visualizar">Visualizar Criatura</a>

    <form action="{{ route('criaturas.destroy', $criatura->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este equipamento?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="sidebar-btn btn-excluir">Excluir Criatura</button>
    </form>

    <button type="submit" form="form-editar-criatura" class="sidebar-btn btn-atualizar">Atualizar Criatura</button>
    </div>

</div>
@endsection