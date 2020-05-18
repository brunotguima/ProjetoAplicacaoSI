@extends('main')

@section('content')
<h2 class="ui dividing header">Editar Usuário</h2>


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


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id], 'class' => 'ui form']) !!}
    <div class="field">
        <strong>Nome:</strong>
        {!! Form::text('name', null, array('placeholder' => 'Nome')) !!}
    </div>
    <div class="field">
      <strong>Email:</strong>
      {!! Form::text('email', null, array('placeholder' => 'Email')) !!}
  </div>
  <div class="field">
    <strong>Cargo:</strong>
    {!! Form::text('cargo', null, array('placeholder' => 'Seu cargo na empresa')) !!}
</div>
<div class="field">
        <strong>Senha:</strong>
        {!! Form::password('password', array('placeholder' => 'Senha')) !!}
    </div>
    <div class="field">
        <strong>Confirmar Senha:</strong>
        {!! Form::password('confirm-password', array('placeholder' => 'Confirmar Senha')) !!}
    </div>
    <div class="field">
        <strong>Tipos de Funcionário:</strong>
        {!! Form::select('roles[]', $roles,$userRole, array('class' => 'ui dropdown','multiple' => '')) !!}
    </div>
    <button type="submit" class="ui blue button">Submitar</button>
</div>
{!! Form::close() !!}
@endsection