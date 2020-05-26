@extends('main')

@section('content')
    <div class="ui container">
        <h2 class="ui dividing header">Ver Manutenções</h2>
        <div class="ui form">
            <div class="ui card">
                <div class="image" style="background-color: grey;">

                </div>
                <div class="content">
                    <a class="header">{{$manutencao->carro->marca}}</a>
                    <div class="meta">
                        <span class="date">{{$manutencao->created_at}}</span>
                        <br> 
                        <span class="date">{{$manutencao->mecanico->razaosocial}}</span>
                        <br>                        
                        <span class="date">{{$manutencao->descricao}}</span>
                        <br> 
                        <span class="date">{{$manutencao->total}}</span>
                        <br>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection