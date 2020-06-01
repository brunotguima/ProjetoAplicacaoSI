@extends('main')

@section('content')
<div class="ui container">
    <h2 class="ui dividing header">Editar Manutenções</h2>
    {!! Form::model($manutencao, ['method' => 'PATCH','route' => ['manutencoes.update', $manutencao->id], 'class' => 'ui form']) !!}
    <div class="field">
        <label>Mecânico:</label>
        {!! Form::select('mecanico_id', $manutencaoMecanico, $mecanicos,array('class' => 'ui dropdown')) !!}
    </div>
    <div class="field">
        <label>Carro:</label>
        {!! Form::select('veiculo_id', $manutencaoVeiculo, $veiculos, array('class' => 'ui dropdown')) !!}
    </div>
    <div class="field">
        <label>Data:</label>
        {!! Form::date('data', null) !!}
    </div>
    <div class="field">
        <label>Descrição:</label>
        {!! Form::textarea('descricao', null) !!}
    </div>
    <div class="field">
        <label>Preço Total:</label>
        {!! Form::text('total', null) !!}
    </div>
    <button type="submit" class="ui blue button">Enviar</button>
</div>
</div>
@endsection