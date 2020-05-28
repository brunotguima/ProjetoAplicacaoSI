@extends('main')

@section('content')
<div class="ui container" style="margin-top: 20px">
    <h2 class="ui dividing header">Gerenciamento de Mecânicos <a href="{{route('mecanicos.create')}}"><i
                class="plus red icon" style="float: right"></i></a></h2>

    <div class="ui form">
        <table class="ui table">
            <thead>
                <tr>
                    <th>Razão Social</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Número</th>
                    <th>Cidade</th>
                    <th width="280px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mecanicos as $mecanico)
                <tr>
                    <td>{{$mecanico->razaosocial}}</td>
                    <td>{{$mecanico->logradouro}}</td>
                    <td>{{$mecanico->bairro}}</td>
                    <td>{{$mecanico->numero}}</td>
                    <td>{{$mecanico->cidade}}</td>
                    <td>
                        <a class="ui blue button" href="{{ route('mecanicos.show',$mecanico->id) }}">Ver</a>
                        <a class="ui green button" href="{{ route('mecanicos.edit',$mecanico->id) }}">Editar</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['mecanicos.destroy', $mecanico->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Deletar', ['class' => 'ui red button']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection