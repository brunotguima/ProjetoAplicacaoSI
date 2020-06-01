@extends('main')

@section('content')
    <div class="ui container" style="margin-top: 20px">
        <h2 class="ui dividing header">Cadastrar Mecânico</h2>

    <form class="ui form" action="{{ route('mecanicos.store') }}" method="POST">
        @csrf    
        <div class="field">
                <label>Razão Social:</label>
                <input type="text" name="razaosocial">
                <!-- {!! Form::text('name', null, array('placeholder' => 'Razão Social')) !!} -->
            </div>
            <div class="field">
                <label>Endereço:</label>
                <input type="text" name="logradouro">
                <!-- {!! Form::text('email', null, array('placeholder' => 'E-Mail')) !!} -->
            </div>            
            <div class="field">
                <label>Bairro:</label>
                <input type="text" name="bairro">
                <!-- {!! Form::password('password', array('placeholder' => 'Senha')) !!} -->
            </div>
            <div class="field">
                <label>Número:</label>
                <input type="text" name="numero">
                <!-- {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Senha')) !!} -->
            </div>
            <div class="field">
                <label>Cidade:</label>
                <input type="text" name="cidade">
            </div>
            <button type="submit" class="ui blue button">Submitar</button>
        </div>
    </div>
@endsection