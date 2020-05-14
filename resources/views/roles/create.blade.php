@extends('main')

@section('content')
<h2 class="ui dividing header">Criar nova função</h2>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Eita!</strong> Alguns problemas ocorreram.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


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