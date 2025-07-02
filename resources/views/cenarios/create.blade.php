@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/ficha.create.css') }}">
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

<div class="ficha-wrapper">
  <div class="ficha-container">
    <div class="ficha">
      <h1 class="ficha-titulo">Registrar Novo Cenário</h1>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


      <form id="form-criar-cenario" action="{{ route('cenarios.store') }}" method="POST" enctype="multipart/form-data">
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

          <label data-label="Ambientacão:">
            <input type="text" name="ambientacao">
          </label>

          <label data-label="Período Temporal:">
            <input type="text" name="periodo_temporal">
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Geografia e Ambiente</h2>

          <label data-label="Descrição Física:">
            <textarea name="descricao_fisica"></textarea>
          </label>

          <label data-label="Clima:">
            <input type="text" name="clima">
          </label>

          <label data-label="Recursos Naturais:">
            <textarea name="recursos_naturais"></textarea>
          </label>

          <label data-label="Locais Importantes:">
            <textarea name="locais_importantes"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">População e Cultura</h2>

          <label data-label="Raças e Espécies:">
            <textarea name="racas_especies"></textarea>
          </label>

          <label data-label="Sociedade:">
            <textarea name="sociedade"></textarea>
          </label>

          <label data-label="Crenças e Religião:">
            <textarea name="crencas_religiao"></textarea>
          </label>

          <label data-label="Línguas e Costumes:">
            <textarea name="linguas_costumes"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">História e Política</h2>

          <label data-label="Eventos Importantes:">
            <textarea name="eventos_importantes"></textarea>
          </label>

          <label data-label="Conflitos Atuais:">
            <textarea name="conflitos_atuais"></textarea>
          </label>

          <label data-label="Líderes e Personagens:">
            <textarea name="lideres_personagens"></textarea>
          </label>

          <label data-label="Alianças e Inimizades:">
            <textarea name="aliancas_inimizades"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Magia e Tecnologia</h2>

          <label data-label="Nível Tecnológico:">
            <input type="text" name="nivel_tecnologico">
          </label>

          <label data-label="Presença de Magia:">
            <input type="text" name="presenca_magia">
          </label>

          <label data-label="Instituições Mágicas/Científicas:">
            <textarea name="instituicoes_magicas_cientificas"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Ameaças e Desafios</h2>

          <label data-label="Inimigos Comuns:">
            <textarea name="inimigos_comuns"></textarea>
          </label>

          <label data-label="Perigos Naturais:">
            <textarea name="perigos_naturais"></textarea>
          </label>

          <label data-label="Conflitos Internos:">
            <textarea name="conflitos_internos"></textarea>
          </label>

          <label data-label="Mistérios e Segredos:">
            <textarea name="misterios_segredos"></textarea>
          </label>
        </div>

        <div class="ficha-section">
          <h2 class="titulo-centralizado">Exploração e Interação</h2>

          <label data-label="Locais para Aventuras:">
            <textarea name="locais_aventuras"></textarea>
          </label>

          <label data-label="NPCs Importantes:">
            <textarea name="npcs_importantes"></textarea>
          </label>

          <label data-label="Recursos para Jogadores:">
            <textarea name="recursos_jogadores"></textarea>
          </label>

          <label data-label="Recompensas e Tesouros:">
            <textarea name="recompensas_tesouros"></textarea>
          </label>
        </div>
      </form>
    </div>
  </div>

  <div class="sidebar-direita">
    <h3>Ações</h3>
    <a href="{{ url('/') }}" class="sidebar-btn btn-menu">Voltar ao Menu</a>
    <a href="{{ route('cenarios.index') }}" class="sidebar-btn btn-lista">Voltar à Lista</a>
    <button type="submit" form="form-criar-cenario" class="sidebar-btn btn-atualizar">Salvar Cenário</button>
  </div>
</div>
@endsection
