@extends('main')

@section('content')
<div class="ui container" style="margin-top: 20px">
    <h2 class="ui dividing header">Ver Mecânico</h2>
    <div class="ui two column grid">
        <div class="column">
            <div class="ui card">
                <div class="image" style="background-color: grey;">

                </div>
                <div class="content">
                    <a class="header">{{$mecanico->razaosocial}}</a>
                    <div class="meta">
                        <span class="date">{{$mecanico->logradouro}}, {{$mecanico->numero}}</span>
                        <br>
                        <span class="date">{{$mecanico->bairro}}</span>
                        <br>
                        <span class="date">{{$mecanico->cidade}}</span>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <canvas id="gráfico"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var ctx = document.getElementById('gráfico').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            datasets: [
                {
                    label: 'Preço',
                    backgroundColor: 'transparent',
                    borderColor: 'red',
                    data: [8, 12, 10, 15, 11]
                }
            ]
        },
        responsive: true,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

@endsection