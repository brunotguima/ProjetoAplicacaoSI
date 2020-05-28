@extends('main')

@section('content')
<h2 class="ui dividing header">Gerenciamento de Tipos de Funcionário <a href="{{route('users.create')}}"><i class="plus red icon"
            style="float: right"></i></a></h2>

<table class="ui table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nome</th>
            <th width="280px">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="ui blue button" href="{{ route('roles.show',$role->id) }}">Ver</a>
                @can('role-edit')
                <a class="ui green button" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                @endcan
                @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline'])
                !!}
                {!! Form::submit('Deletar', ['class' => 'ui red button']) !!}
                {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $roles->render() !!}
@endsection