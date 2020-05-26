@extends('main')

@section('content')
    <div class="ui container">
        <h2 class="ui dividing header">Cadastrar Manutenção</h2>

        <div class="ui form">
            <div class="field">
                <label>Mecânico:</label>

                <input type="hidden" name="mecanico">
                <select class="ui dropdown">
                    <option value="">JAILSON MENDES AUTOPEÇAS LTDA</option>
                    <option value="1">PAULO GUINA FUNILARIA & PINTO</option>
                    <option value="0">MADROGINHA MARTELINHO DE PICA</option>
                </select>
                <!-- {!! Form::text('name', null, array('placeholder' => 'Nome')) !!} -->
            </div>
            <div class="field">
                <label>Carro:</label>

                <input type="hidden" name="carro">
                <select class="ui dropdown">
                    <option value="">Fusca</option>
                    <option value="1">Ferrari</option>
                    <option value="0">Porsche</option>
                </select>
                <!-- {!! Form::text('email', null, array('placeholder' => 'Email')) !!} -->
            </div>
            <div class="field">
                <label>Data:</label>
                <input type="date" name="data">
                <!-- {!! Form::password('password', array('placeholder' => 'Senha')) !!} -->
            </div>
            <div class="field">
                <label>Descrição:</label>
                <textarea name="descricao" cols="30" rows="10"></textarea>
                <!-- {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Senha')) !!} -->
            </div>
            <div class="field">
                <label>Preço Total:</label>
                <input type="text" name="preco">
                <!-- {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Senha')) !!} -->
            </div>
            <button type="submit" class="ui blue button">Submitar</button>
        </div>
    </div>
@endsection