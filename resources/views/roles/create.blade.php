@extends('main')

@section('content')
<h2 class="ui dividing header">Criar Novo Usuário</h2>

{!! Form::open(array('route' => 'roles.store','method'=>'POST', 'class' => 'ui form')) !!}
    <div class="field">
        <strong>Nome:</strong>
        {!! Form::text('name', null, array('placeholder' => 'Nome')) !!}
    </div>
    <div class="field">
        <strong>Permissões:</strong>
                {!! Form::select('permission[]', $permission, [], array('class' => 'ui dropdown','multiple' => '')) !!}
    </div>
    <button type="submit" class="ui blue button">Submitar</button>
{!! Form::close() !!}

@endsection