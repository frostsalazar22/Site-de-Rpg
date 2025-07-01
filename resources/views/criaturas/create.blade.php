@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nova Criatura</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('criaturas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Imagem + Nome + Tipo --}}
        <h2>Identificação</h2>
        <div>
            <label>Imagem:</label>
            <input type="file" name="imagem">
        </div>

        <div>
            <label>Nome:</label>
            <input type="text" name="nome" required>
        </div>

        <div>
            <label>Tipo:</label>
            <input type="text" name="tipo">
        </div>

        <div>
            <label>Subtipo:</label>
            <input type="text" name="subtipo">
        </div>

        <div>
            <label>Alinhamento:</label>
            <input type="text" name="alinhamento">
        </div>

        <div>
            <label>Classe de Desafio:</label>
            <input type="text" name="classe_desafio">
        </div>

        <div>
            <label>Categoria de Perigo:</label>
            <input type="text" name="categoria_perigo">
        </div>

        <h2>Características Físicas</h2>
        <div>
            <label>Tamanho:</label>
            <input type="text" name="tamanho">
        </div>
        <div>
            <label>Velocidade:</label>
            <input type="text" name="velocidade">
        </div>
        <div>
            <label>Aparência:</label>
            <textarea name="aparencia"></textarea>
        </div>
        <div>
            <label>Peso e Altura:</label>
            <input type="text" name="peso_altura">
        </div>
        <div>
            <label>Localização Preferida:</label>
            <input type="text" name="localizacao_preferida">
        </div>
        <div>
            <label>Presença Ambiental:</label>
            <textarea name="presenca_ambiental"></textarea>
        </div>

        <h2>Atributos</h2>
        @foreach (['for', 'des', 'con', 'int', 'sab', 'car'] as $atributo)
            <div>
                <label>{{ strtoupper($atributo) }}:</label>
                <input type="number" name="{{ $atributo }}">
            </div>
        @endforeach

        <h2>Resistências</h2>
        <div>
            <label>Resistências:</label>
            <textarea name="resistencias" placeholder="Ex: Fogo, Veneno"></textarea>
        </div>
        <div>
            <label>Imunidades:</label>
            <textarea name="imunidades" placeholder="Ex: Sono, Controle Mental"></textarea>
        </div>
        <div>
            <label>Vulnerabilidades:</label>
            <textarea name="vulnerabilidades" placeholder="Ex: Gelo, Prata"></textarea>
        </div>
        <div>
            <label>Resistências Condicionais:</label>
            <textarea name="resistencias_condicionais"></textarea>
        </div>

        <h2>Estatísticas de Combate</h2>
        <div>
            <label>PV:</label>
            <input type="text" name="pv" placeholder="Ex: 8d10+16">
        </div>
        <div>
            <label>CA:</label>
            <input type="text" name="ca" placeholder="Classe de Armadura">
        </div>
        <div>
            <label>Reações:</label>
            <textarea name="reacoes"></textarea>
        </div>
        <div>
            <label>Condições Infligidas:</label>
            <textarea name="condicoes_infligidas"></textarea>
        </div>

        <h2>Ações</h2>
        <div>
            <label>Ataques Comuns:</label>
            <textarea name="ataques_comuns"></textarea>
        </div>
        <div>
            <label>Ações Especiais:</label>
            <textarea name="acoes_especiais"></textarea>
        </div>
        <div>
            <label>Ações Lendárias:</label>
            <textarea name="acoes_lendarias"></textarea>
        </div>

        <h2>Comportamento e Lore</h2>
        <div>
            <label>Origem:</label>
            <textarea name="origem"></textarea>
        </div>
        <div>
            <label>Motivações:</label>
            <textarea name="motivacoes"></textarea>
        </div>
        <div>
            <label>Hábito Social:</label>
            <textarea name="habito_social"></textarea>
        </div>
        <div>
            <label>Mistérios:</label>
            <textarea name="misterios"></textarea>
        </div>
        <div>
            <label>Rotina:</label>
            <textarea name="rotina"></textarea>
        </div>
        <div>
            <label>Impacto no Mundo:</label>
            <textarea name="impacto_mundo"></textarea>
        </div>

        <h2>Estágios</h2>
        <div>
            <label>Descrição Estágios:</label>
            <textarea name="descricao_estagios"></textarea>
        </div>
        <div>
            <label>Condições de Transição:</label>
            <textarea name="condicoes_transicao"></textarea>
        </div>
        <div>
            <label>Estágio 1:</label>
            <textarea name="estagio_1"></textarea>
        </div>
        <div>
            <label>Estágio 2:</label>
            <textarea name="estagio_2"></textarea>
        </div>
        <div>
            <label>Estágio 3:</label>
            <textarea name="estagio_3"></textarea>
        </div>

        <h2>Habilidades</h2>
        <div>
            <label>Habilidades Passivas:</label>
            <textarea name="habilidades_passivas"></textarea>
        </div>
        <div>
            <label>Habilidades Ativas:</label>
            <textarea name="habilidades_ativas"></textarea>
        </div>

        <h2>Interações Narrativas</h2>
        <div>
            <label>Influência no Jogo:</label>
            <textarea name="influencia_jogo"></textarea>
        </div>
        <div>
            <label>Conexões:</label>
            <textarea name="conexoes"></textarea>
        </div>
        <div>
            <label>Detalhes Cinemáticos:</label>
            <textarea name="detalhes_cinematicos"></textarea>
        </div>

        <h2>Recompensas</h2>
        <div>
            <label>Tesouro:</label>
            <textarea name="tesouro"></textarea>
        </div>
        <div>
            <label>Componentes de Alquimia:</label>
            <textarea name="componentes_alquimia"></textarea>
        </div>
        <div>
            <label>Conhecimento:</label>
            <textarea name="conhecimento"></textarea>
        </div>
        <div>
            <label>Benefícios Temporários:</label>
            <textarea name="beneficios_temporarios"></textarea>
        </div>

        <h2>Notas Finais</h2>
        <div>
            <label>Notas Opcionais:</label>
            <textarea name="notas_opcionais"></textarea>
        </div>
        <div>
            <label>Habilidades Variantes:</label>
            <textarea name="habilidades_variantes"></textarea>
        </div>
        <div>
            <label>Evolução:</label>
            <textarea name="evolucao"></textarea>
        </div>
        <div>
            <label>Impacto no Ambiente:</label>
            <textarea name="impacto_ambiente"></textarea>
        </div>

        <br>
        <button type="submit">Salvar Criatura</button>
    </form>
</div>
@endsection
