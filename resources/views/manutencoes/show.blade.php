@extends('main')

@section('content')
    <div class="ui container">
        <h2 class="ui dividing header" style="margin-top: 20px">Ver Manutenções</h2>
        <div class="ui form">
            <div class="ui card">
                <div class="image" style="background-color: grey;">

                </div>
                <div class="content">
                <a class="header">
                    Carro: {{$manutencao->veiculo->modelo}}
                    <br>
                    Mecânico: {{$manutencao->mecanico->razaosocial}}
                </a>
                    <div class="meta">
                        <span class="date">{{Carbon\Carbon::parse($manutencao->created_at)->format('d/m/Y')}}</span>
                        <br>                        
                        <span class="date">{{$manutencao->descricao}}</span>
                        <br> 
                        <span class="date">R$ {{$manutencao->total}}</span>
                        <br>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection