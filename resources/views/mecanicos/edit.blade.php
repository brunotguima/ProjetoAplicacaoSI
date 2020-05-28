@extends('main')

@section('content')
<div class="ui container" style="margin-top: 20px">
    <h2 class="ui dividing header">Editar Mecânico</h2>

    {!! Form::model($mecanico, ['method' => 'PATCH','route' => ['mecanicos.update', $mecanico->id], 'class' => 'ui form']) !!}
    <div class="field">
        <label>Razão Social:</label>
        <input type="text" name="razaosocial" value="{{$mecanico->razaosocial}}">
    </div>
    <div class="field">
        <label>Endereço:</label>
        <input type="text" name="logradouro" value="{{$mecanico->logradouro}}">
    </div>
    <div class="field">
        <label>Bairro:</label>
        <input type="text" name="bairro" value="{{$mecanico->bairro}}">
    </div>
    <div class="field">
        <label>Número:</label>
        <input type="text" name="numero" value="{{$mecanico->numero}}">
    </div>
    <div class="field">
        <label>Cidade:</label>
        <input type="text" name="cidade" value="{{$mecanico->cidade}}">
    </div>
    <button type="submit" class="ui blue button">Atualizar</button>
    </form>
</div>
@endsection