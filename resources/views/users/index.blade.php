@extends('/layouts/layout')

@section('content')
<h2 class="ui dividing header">Gerenciamento de Usuários <a href="{{route('users.create')}}"><i class="plus red icon" style="float: right"></i></a></h2>

<table class="ui table">
 <thead>
  <tr> 
    <th>No</th>
    <th>Nome</th>
    <th>Cargo</th>
    <th>Email</th>
    <th>Tipos</th>
    <th width="280px">Ações</th>
  </tr>
 </thead>
 <tbody>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->cargo }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="ui green horizontal label">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="ui blue button" href="{{ route('users.show',$user->id) }}">Ver</a>
       <a class="ui green button" href="{{ route('users.edit',$user->id) }}">Editar</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Deletar', ['class' => 'ui red button']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
 </tbody>
</table>


{!! $data->render() !!}

@endsection