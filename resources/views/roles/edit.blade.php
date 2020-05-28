@extends('main')

@section('content')
<h2 class="ui dividing header">Editar Usuário</h2>

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id], 'class' => 'ui form']) !!}
<div class="field">
    <label>Nome:</label>
    {!! Form::text('name', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}
</div>
<div class="field">
    <label>Permissões:</label>
    {!! Form::select('permission[]', $permission, $rolePermissions, array('class' => 'ui dropdown','multiple' => '')) !!}
</div>
<div class="field">
    <button type="submit" class="ui blue button">Submit</button>
</div>
</div>
{!! Form::close() !!}

@endsection