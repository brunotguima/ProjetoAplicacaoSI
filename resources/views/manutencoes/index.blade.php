@extends('main')

@section('content')
<div class="ui container" style="margin-top: 20px">
    <h2 class="ui dividing header">Gerenciamento de Manutenções <a href="{{route('manutencoes.create')}}"><i
                class="plus red icon" style="float: right"></i></a></h2>

    <div class="ui form">
        <table class="ui table">
            <thead>
                <tr>
                    <th>Mecânico</th>
                    <th>Carro</th>
                    <th>Data/Hora</th>
                    <th>Preço Total</th>
                    <th width="280px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manutencoes as $manutencao)
                <tr>
                    <td>{{$manutencao->mecanico->nome}}</td>
                    <td>{{$manutencao->carro->modelo}}</td>
                    <td>{{$manutencao->created_at}}</td>
                    <td>R$ {{$manutencao->total}}</td>
                    <td>
                        <a class="ui blue button" href="{{ route('manutencoes.show',$manutencao->id) }}">Ver</a>
                        <a class="ui green button" href="{{ route('manutencoes.edit',$manutencao->id) }}">Editar</a>
                        <a class="ui red button" href="{{ route('manutencoes.edit',$usmanutencaoer->id) }}">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection