@extends('layouts.app')

@section('content')

<div class="container" style="display: flex; gap: 30px;"> {{-- Conteúdo principal da criatura --}} 
<div style="flex: 1;"> 
<h1>Detalhes da Criatura: {{ $criatura->nome }}</h1>
php-template
Copiar
Editar
    @if($criatura->imagem)
        <div style="margin-bottom: 20px;">
            <img src="{{ asset('storage/' . $criatura->imagem) }}" alt="{{ $criatura->nome }}" style="max-width: 300px;">
        </div>
    @endif

    <h3>Identificação</h3>
    <p><strong>Tipo:</strong> {{ $criatura->tipo }}</p>
    <p><strong>Subtipo:</strong> {{ $criatura->subtipo }}</p>
    <p><strong>Alinhamento:</strong> {{ $criatura->alinhamento }}</p>
    <p><strong>Classe de Desafio:</strong> {{ $criatura->classe_desafio }}</p>
    <p><strong>Categoria de Perigo:</strong> {{ $criatura->categoria_perigo }}</p>

    <h3>Características Físicas</h3>
    <p><strong>Tamanho:</strong> {{ $criatura->tamanho }}</p>
    <p><strong>Velocidade:</strong> {{ $criatura->velocidade }}</p>
    <p><strong>Aparência:</strong> {!! nl2br(e($criatura->aparencia)) !!}</p>
    <p><strong>Peso e Altura:</strong> {{ $criatura->peso_altura }}</p>
    <p><strong>Localização Preferida:</strong> {{ $criatura->localizacao_preferida }}</p>
    <p><strong>Presença Ambiental:</strong> {!! nl2br(e($criatura->presenca_ambiental)) !!}</p>

    <h3>Atributos</h3>
    <p><strong>FOR:</strong> {{ $criatura->for }}</p>
    <p><strong>DES:</strong> {{ $criatura->des }}</p>
    <p><strong>CON:</strong> {{ $criatura->con }}</p>
    <p><strong>INT:</strong> {{ $criatura->int }}</p>
    <p><strong>SAB:</strong> {{ $criatura->sab }}</p>
    <p><strong>CAR:</strong> {{ $criatura->car }}</p>

    <h3>Resistências</h3>
    <p><strong>Resistências:</strong> {!! nl2br(e($criatura->resistencias)) !!}</p>
    <p><strong>Imunidades:</strong> {!! nl2br(e($criatura->imunidades)) !!}</p>
    <p><strong>Vulnerabilidades:</strong> {!! nl2br(e($criatura->vulnerabilidades)) !!}</p>
    <p><strong>Resistências Condicionais:</strong> {!! nl2br(e($criatura->resistencias_condicionais)) !!}</p>

    <h3>Estatísticas de Combate</h3>
    <p><strong>PV:</strong> {{ $criatura->pv }}</p>
    <p><strong>CA:</strong> {{ $criatura->ca }}</p>
    <p><strong>Reações:</strong> {!! nl2br(e($criatura->reacoes)) !!}</p>
    <p><strong>Condições Infligidas:</strong> {!! nl2br(e($criatura->condicoes_infligidas)) !!}</p>

    <h3>Ações</h3>
    <p><strong>Ataques Comuns:</strong> {!! nl2br(e($criatura->ataques_comuns)) !!}</p>
    <p><strong>Ações Especiais:</strong> {!! nl2br(e($criatura->acoes_especiais)) !!}</p>
    <p><strong>Ações Lendárias:</strong> {!! nl2br(e($criatura->acoes_lendarias)) !!}</p>

    <h3>Comportamento e Lore</h3>
    <p><strong>Origem:</strong> {!! nl2br(e($criatura->origem)) !!}</p>
    <p><strong>Motivações:</strong> {!! nl2br(e($criatura->motivacoes)) !!}</p>
    <p><strong>Hábito Social:</strong> {!! nl2br(e($criatura->habito_social)) !!}</p>
    <p><strong>Mistérios:</strong> {!! nl2br(e($criatura->misterios)) !!}</p>
    <p><strong>Rotina:</strong> {!! nl2br(e($criatura->rotina)) !!}</p>
    <p><strong>Impacto no Mundo:</strong> {!! nl2br(e($criatura->impacto_mundo)) !!}</p>

    <h3>Estágios</h3>
    <p><strong>Descrição dos Estágios:</strong> {!! nl2br(e($criatura->descricao_estagios)) !!}</p>
    <p><strong>Condições de Transição:</strong> {!! nl2br(e($criatura->condicoes_transicao)) !!}</p>
    <p><strong>Estágio 1:</strong> {!! nl2br(e($criatura->estagio_1)) !!}</p>
    <p><strong>Estágio 2:</strong> {!! nl2br(e($criatura->estagio_2)) !!}</p>
    <p><strong>Estágio 3:</strong> {!! nl2br(e($criatura->estagio_3)) !!}</p>

    <h3>Habilidades</h3>
    <p><strong>Habilidades Passivas:</strong> {!! nl2br(e($criatura->habilidades_passivas)) !!}</p>
    <p><strong>Habilidades Ativas:</strong> {!! nl2br(e($criatura->habilidades_ativas)) !!}</p>

    <h3>Interações Narrativas</h3>
    <p><strong>Influência no Jogo:</strong> {!! nl2br(e($criatura->influencia_jogo)) !!}</p>
    <p><strong>Conexões:</strong> {!! nl2br(e($criatura->conexoes)) !!}</p>
    <p><strong>Detalhes Cinemáticos:</strong> {!! nl2br(e($criatura->detalhes_cinematicos)) !!}</p>

    <h3>Recompensas</h3>
    <p><strong>Tesouro:</strong> {!! nl2br(e($criatura->tesouro)) !!}</p>
    <p><strong>Componentes de Alquimia:</strong> {!! nl2br(e($criatura->componentes_alquimia)) !!}</p>
    <p><strong>Conhecimento:</strong> {!! nl2br(e($criatura->conhecimento)) !!}</p>
    <p><strong>Benefícios Temporários:</strong> {!! nl2br(e($criatura->beneficios_temporarios)) !!}</p>

    <h3>Notas Finais</h3>
    <p><strong>Notas Opcionais:</strong> {!! nl2br(e($criatura->notas_opcionais)) !!}</p>
    <p><strong>Habilidades Variantes:</strong> {!! nl2br(e($criatura->habilidades_variantes)) !!}</p>
    <p><strong>Evolução:</strong> {!! nl2br(e($criatura->evolucao)) !!}</p>
    <p><strong>Impacto no Ambiente:</strong> {!! nl2br(e($criatura->impacto_ambiente)) !!}</p>
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
    <a href="{{ route('criaturas.edit', $criatura->id) }}" class="btn btn-primary">✏️ Editar Criatura</a>
    <form action="{{ route('criaturas.destroy', $criatura->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta criatura?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">🗑️ Excluir Criatura</button>
    </form>
    <a href="{{ url('/') }}" class="btn btn-outline-dark">🏠 Voltar ao Menu</a>
</div>


</div> @endsection