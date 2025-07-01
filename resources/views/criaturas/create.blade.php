@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Registrar Nova Criatura</h1>

      @if ($errors->any())
        <div style="color: red; margin-bottom: 20px;">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form id="form-criar-criatura" action="{{ route('criaturas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Identificação</h2>

          <label data-label="Imagem:">
            <input type="file" name="imagem">
          </label>

          <label data-label="Nome:">
            <input type="text" name="nome" required>
          </label>

          <label data-label="Tipo:">
            <input type="text" name="tipo">
          </label>

          <label data-label="Subtipo:">
            <input type="text" name="subtipo">
          </label>

          <label data-label="Alinhamento:">
            <input type="text" name="alinhamento">
          </label>

          <label data-label="Classe de Desafio:">
            <input type="text" name="classe_desafio">
          </label>

          <label data-label="Categoria de Perigo:">
            <input type="text" name="categoria_perigo">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Características Físicas</h2>

          <label data-label="Tamanho:">
            <input type="text" name="tamanho">
          </label>

          <label data-label="Velocidade:">
            <input type="text" name="velocidade">
          </label>

          <label data-label="Aparência:">
            <textarea name="aparencia"></textarea>
          </label>

          <label data-label="Peso e Altura:">
            <input type="text" name="peso_altura">
          </label>

          <label data-label="Localização Preferida:">
            <input type="text" name="localizacao_preferida">
          </label>

          <label data-label="Presença Ambiental:">
            <textarea name="presenca_ambiental"></textarea>
          </label>
        </div>

        <div class="ficha-section atributos">
          <h2 class="titulo-centralizado">Atributos</h2>
          <div class="atributos-grid">
            @foreach (['for', 'des', 'con', 'int', 'sab', 'car'] as $atributo)
              <div>
                <label>{{ strtoupper($atributo) }}:</label>
                <input type="number" name="{{ $atributo }}">
              </div>
            @endforeach
          </div>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Resistências</h2>

          <label data-label="Resistências:">
            <textarea name="resistencias" placeholder="Ex: Fogo, Veneno"></textarea>
          </label>

          <label data-label="Imunidades:">
            <textarea name="imunidades" placeholder="Ex: Sono, Controle Mental"></textarea>
          </label>

          <label data-label="Vulnerabilidades:">
            <textarea name="vulnerabilidades" placeholder="Ex: Gelo, Prata"></textarea>
          </label>

          <label data-label="Resistências Condicionais:">
            <textarea name="resistencias_condicionais"></textarea>
          </label>

          <label data-label="Descrição:">
            <textarea name="descricao"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Estatísticas de Combate</h2>

          <label data-label="PV:">
            <input type="text" name="pv" placeholder="Ex: 8d10+16">
          </label>

          <label data-label="CA:">
            <input type="text" name="ca" placeholder="Classe de Armadura">
          </label>

          <label data-label="Reações:">
            <textarea name="reacoes"></textarea>
          </label>

          <label data-label="Condições Infligidas:">
            <textarea name="condicoes_infligidas"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Ações</h2>

          <label data-label="Ataques Comuns:">
            <textarea name="ataques_comuns"></textarea>
          </label>

          <label data-label="Ações Especiais:">
            <textarea name="acoes_especiais"></textarea>
          </label>

          <label data-label="Ações Lendárias:">
            <textarea name="acoes_lendarias"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Comportamento e Lore</h2>

          <label data-label="Origem:">
            <textarea name="origem"></textarea>
          </label>

          <label data-label="Motivações:">
            <textarea name="motivacoes"></textarea>
          </label>

          <label data-label="Hábito Social:">
            <textarea name="habito_social"></textarea>
          </label>

          <label data-label="Mistérios:">
            <textarea name="misterios"></textarea>
          </label>

          <label data-label="Rotina:">
            <textarea name="rotina"></textarea>
          </label>

          <label data-label="Impacto no Mundo:">
            <textarea name="impacto_mundo"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Estágios</h2>

          <label data-label="Descrição Estágios:">
            <textarea name="descricao_estagios"></textarea>
          </label>

          <label data-label="Condições de Transição:">
            <textarea name="condicoes_transicao"></textarea>
          </label>

          <label data-label="Estágio 1:">
            <textarea name="estagio_1"></textarea>
          </label>

          <label data-label="Estágio 2:">
            <textarea name="estagio_2"></textarea>
          </label>

          <label data-label="Estágio 3:">
            <textarea name="estagio_3"></textarea>
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
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Interações Narrativas</h2>

          <label data-label="Influência no Jogo:">
            <textarea name="influencia_jogo"></textarea>
          </label>

          <label data-label="Conexões:">
            <textarea name="conexoes"></textarea>
          </label>

          <label data-label="Detalhes Cinemáticos:">
            <textarea name="detalhes_cinematicos"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Recompensas</h2>

          <label data-label="Tesouro:">
            <textarea name="tesouro"></textarea>
          </label>

          <label data-label="Componentes de Alquimia:">
            <textarea name="componentes_alquimia"></textarea>
          </label>

          <label data-label="Conhecimento:">
            <textarea name="conhecimento"></textarea>
          </label>

          <label data-label="Benefícios Temporários:">
            <textarea name="beneficios_temporarios"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Notas Finais</h2>

          <label data-label="Notas Opcionais:">
            <textarea name="notas_opcionais"></textarea>
          </label>

          <label data-label="Habilidades Variantes:">
            <textarea name="habilidades_variantes"></textarea>
          </label>

          <label data-label="Evolução:">
            <textarea name="evolucao"></textarea>
          </label>

          <label data-label="Impacto no Ambiente:">
            <textarea name="impacto_ambiente"></textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

    <div class="sidebar-direita">
    <h3>Ações</h3>

    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>

    <a href="{{ route('criaturas.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>

    <button type="submit" form="form-criar-criatura" class="sidebar-btn btn-atualizar">Salvar Criatura</button>
    </div>

</div>
@endsection