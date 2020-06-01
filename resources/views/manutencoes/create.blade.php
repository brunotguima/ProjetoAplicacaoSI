@extends('main')

@section('content')
<div class="ui container" style="margin-top: 20px">
    <h2 class="ui dividing header">Cadastrar Manutenção</h2>
    {!! Form::open(array('route' => 'manutencoes.store','method'=>'POST','class' =>'ui form')) !!}
    <div class="field">
        <label>Mecânico:</label>
        {!! Form::select('mecanico_id', $mecanicos, [], array('class' => 'ui dropdown')) !!}
    </div>
    <div class="field">
        <label>Carro:</label>
        {!! Form::select('veiculo_id', $veiculos, [], array('class' => 'ui dropdown')) !!}
    </div>
    <div class="field">
        <label>Data:</label>
        <input type="date" name="data">
    </div>
    <div class="field">
        <label>Descrição:</label>
        <textarea name="descricao" cols="30" rows="10"></textarea>
    </div>
    <div class="field">
        <label>Preço Total:</label>
        <input type="text" name="total">
    </div>
    <button type="submit" class="ui blue button">Submitar</button>
    {!! Form::close() !!}

</div>
</div>
@endsection