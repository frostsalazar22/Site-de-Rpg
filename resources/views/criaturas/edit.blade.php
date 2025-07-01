@extends('layouts.app')

@section('content')
<div class="container" style="display: flex; gap: 30px;">
    {{-- Formulário de edição --}}
    <div style="flex: 1;">
        <h1>Editar Criatura: {{ $criatura->nome }}</h1>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('criaturas.update', $criatura->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2>Imagem</h2>
            <div>
                <label>Imagem Atual:</label>
                @if($criatura->imagem)
                    <img src="{{ asset('storage/' . $criatura->imagem) }}" alt="Imagem Atual" style="max-width: 150px;">
                @else
                    <p>Sem imagem</p>
                @endif
            </div>
            <div>
                <label>Nova Imagem (opcional):</label>
                <input type="file" name="imagem">
            </div>

        <h2>Identificação</h2>
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $criatura->nome) }}" required>
        </div>

        <div>
            <label>Tipo:</label>
            <input type="text" name="tipo" value="{{ old('tipo', $criatura->tipo) }}">
        </div>

        <div>
            <label>Subtipo:</label>
            <input type="text" name="subtipo" value="{{ old('subtipo', $criatura->subtipo) }}">
        </div>

        <div>
            <label>Alinhamento:</label>
            <input type="text" name="alinhamento" value="{{ old('alinhamento', $criatura->alinhamento) }}">
        </div>

        <div>
            <label>Classe de Desafio:</label>
            <input type="text" name="classe_desafio" value="{{ old('classe_desafio', $criatura->classe_desafio) }}">
        </div>

        <div>
            <label>Categoria de Perigo:</label>
            <input type="text" name="categoria_perigo" value="{{ old('categoria_perigo', $criatura->categoria_perigo) }}">
        </div>

        <h2>Características Físicas</h2>
        <div>
            <label>Tamanho:</label>
            <input type="text" name="tamanho" value="{{ old('tamanho', $criatura->tamanho) }}">
        </div>

        <div>
            <label>Velocidade:</label>
            <input type="text" name="velocidade" value="{{ old('velocidade', $criatura->velocidade) }}">
        </div>

        <div>
            <label>Aparência:</label>
            <textarea name="aparencia">{{ old('aparencia', $criatura->aparencia) }}</textarea>
        </div>

        <div>
            <label>Peso e Altura:</label>
            <input type="text" name="peso_altura" value="{{ old('peso_altura', $criatura->peso_altura) }}">
        </div>

        <div>
            <label>Localização Preferida:</label>
            <input type="text" name="localizacao_preferida" value="{{ old('localizacao_preferida', $criatura->localizacao_preferida) }}">
        </div>

        <div>
            <label>Presença Ambiental:</label>
            <textarea name="presenca_ambiental">{{ old('presenca_ambiental', $criatura->presenca_ambiental) }}</textarea>
        </div>

        <h2>Atributos</h2>
        @foreach (['for', 'des', 'con', 'int', 'sab', 'car'] as $atributo)
            <div>
                <label>{{ strtoupper($atributo) }}:</label>
                <input type="number" name="{{ $atributo }}" value="{{ old($atributo, $criatura->$atributo) }}">
            </div>
        @endforeach

        <h2>Resistências</h2>
        <div>
            <label>Resistências:</label>
            <textarea name="resistencias">{{ old('resistencias', $criatura->resistencias) }}</textarea>
        </div>
        <div>
            <label>Imunidades:</label>
            <textarea name="imunidades">{{ old('imunidades', $criatura->imunidades) }}</textarea>
        </div>
        <div>
            <label>Vulnerabilidades:</label>
            <textarea name="vulnerabilidades">{{ old('vulnerabilidades', $criatura->vulnerabilidades) }}</textarea>
        </div>
        <div>
            <label>Resistências Condicionais:</label>
            <textarea name="resistencias_condicionais">{{ old('resistencias_condicionais', $criatura->resistencias_condicionais) }}</textarea>
        </div>

        <h2>Estatísticas de Combate</h2>
        <div>
            <label>PV:</label>
            <input type="text" name="pv" value="{{ old('pv', $criatura->pv) }}">
        </div>
        <div>
            <label>CA:</label>
            <input type="text" name="ca" value="{{ old('ca', $criatura->ca) }}">
        </div>
        <div>
            <label>Reações:</label>
            <textarea name="reacoes">{{ old('reacoes', $criatura->reacoes) }}</textarea>
        </div>
        <div>
            <label>Condições Infligidas:</label>
            <textarea name="condicoes_infligidas">{{ old('condicoes_infligidas', $criatura->condicoes_infligidas) }}</textarea>
        </div>

        <h2>Ações</h2>
        <div>
            <label>Ataques Comuns:</label>
            <textarea name="ataques_comuns">{{ old('ataques_comuns', $criatura->ataques_comuns) }}</textarea>
        </div>
        <div>
            <label>Ações Especiais:</label>
            <textarea name="acoes_especiais">{{ old('acoes_especiais', $criatura->acoes_especiais) }}</textarea>
        </div>
        <div>
            <label>Ações Lendárias:</label>
            <textarea name="acoes_lendarias">{{ old('acoes_lendarias', $criatura->acoes_lendarias) }}</textarea>
        </div>

        <h2>Comportamento e Lore</h2>
        <div>
            <label>Origem:</label>
            <textarea name="origem">{{ old('origem', $criatura->origem) }}</textarea>
        </div>
        <div>
            <label>Motivações:</label>
            <textarea name="motivacoes">{{ old('motivacoes', $criatura->motivacoes) }}</textarea>
        </div>
        <div>
            <label>Hábito Social:</label>
            <textarea name="habito_social">{{ old('habito_social', $criatura->habito_social) }}</textarea>
        </div>
        <div>
            <label>Mistérios:</label>
            <textarea name="misterios">{{ old('misterios', $criatura->misterios) }}</textarea>
        </div>
        <div>
            <label>Rotina:</label>
            <textarea name="rotina">{{ old('rotina', $criatura->rotina) }}</textarea>
        </div>
        <div>
            <label>Impacto no Mundo:</label>
            <textarea name="impacto_mundo">{{ old('impacto_mundo', $criatura->impacto_mundo) }}</textarea>
        </div>

        <h2>Estágios</h2>
        <div>
            <label>Descrição dos Estágios:</label>
            <textarea name="descricao_estagios">{{ old('descricao_estagios', $criatura->descricao_estagios) }}</textarea>
        </div>
        <div>
            <label>Condições de Transição:</label>
            <textarea name="condicoes_transicao">{{ old('condicoes_transicao', $criatura->condicoes_transicao) }}</textarea>
        </div>
        <div>
            <label>Estágio 1:</label>
            <textarea name="estagio_1">{{ old('estagio_1', $criatura->estagio_1) }}</textarea>
        </div>
        <div>
            <label>Estágio 2:</label>
            <textarea name="estagio_2">{{ old('estagio_2', $criatura->estagio_2) }}</textarea>
        </div>
        <div>
            <label>Estágio 3:</label>
            <textarea name="estagio_3">{{ old('estagio_3', $criatura->estagio_3) }}</textarea>
        </div>

        <h2>Habilidades</h2>
        <div>
            <label>Habilidades Passivas:</label>
            <textarea name="habilidades_passivas">{{ old('habilidades_passivas', $criatura->habilidades_passivas) }}</textarea>
        </div>
        <div>
            <label>Habilidades Ativas:</label>
            <textarea name="habilidades_ativas">{{ old('habilidades_ativas', $criatura->habilidades_ativas) }}</textarea>
        </div>

        <h2>Interações Narrativas</h2>
        <div>
            <label>Influência no Jogo:</label>
            <textarea name="influencia_jogo">{{ old('influencia_jogo', $criatura->influencia_jogo) }}</textarea>
        </div>
        <div>
            <label>Conexões:</label>
            <textarea name="conexoes">{{ old('conexoes', $criatura->conexoes) }}</textarea>
        </div>
        <div>
            <label>Detalhes Cinemáticos:</label>
            <textarea name="detalhes_cinematicos">{{ old('detalhes_cinematicos', $criatura->detalhes_cinematicos) }}</textarea>
        </div>

        <h2>Recompensas</h2>
        <div>
            <label>Tesouro:</label>
            <textarea name="tesouro">{{ old('tesouro', $criatura->tesouro) }}</textarea>
        </div>
        <div>
            <label>Componentes de Alquimia:</label>
            <textarea name="componentes_alquimia">{{ old('componentes_alquimia', $criatura->componentes_alquimia) }}</textarea>
        </div>
        <div>
            <label>Conhecimento:</label>
            <textarea name="conhecimento">{{ old('conhecimento', $criatura->conhecimento) }}</textarea>
        </div>
        <div>
            <label>Benefícios Temporários:</label>
            <textarea name="beneficios_temporarios">{{ old('beneficios_temporarios', $criatura->beneficios_temporarios) }}</textarea>
        </div>

        <h2>Notas Finais</h2>
        <div>
            <label>Notas Opcionais:</label>
            <textarea name="notas_opcionais">{{ old('notas_opcionais', $criatura->notas_opcionais) }}</textarea>
        </div>
        <div>
            <label>Habilidades Variantes:</label>
            <textarea name="habilidades_variantes">{{ old('habilidades_variantes', $criatura->habilidades_variantes) }}</textarea>
        </div>
        <div>
            <label>Evolução:</label>
            <textarea name="evolucao">{{ old('evolucao', $criatura->evolucao) }}</textarea>
        </div>
        <div>
            <label>Impacto no Ambiente:</label>
            <textarea name="impacto_ambiente">{{ old('impacto_ambiente', $criatura->impacto_ambiente) }}</textarea>
        </div>

        <br>
            <button type="submit">Atualizar Criatura</button>
        </form>
    </div>

    {{-- Sidebar de ações --}}
    <div style="
        width: 220px;
        padding: 20px;
        background-color: #f9f9f9;
        border-left: 1px solid #ddd;
        border-radius: 8px;
        height: fit-content;
        position: sticky;
        top: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    ">
        <h4 style="margin-top: 0;">Ações</h4>
        <a href="{{ route('criaturas.index') }}" class="btn btn-secondary">← Voltar à lista</a>
        <a href="{{ route('criaturas.show', $criatura->id) }}" class="btn btn-info">👁️ Visualizar Criatura</a>
        <form action="{{ route('criaturas.destroy', $criatura->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta criatura?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">🗑️ Excluir Criatura</button>
        </form>
        <a href="{{ url('/') }}" class="btn btn-outline-dark">🏠 Voltar ao Menu</a>
    </div>
</div>
@endsection
