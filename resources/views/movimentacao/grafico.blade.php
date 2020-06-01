@extends('main')

@section('content')
<div class="ui container">
    <div class="ui segment">
        <canvas id="myChart"></canvas>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var url = "{{route('saidas.teste')}}";
    var datas = new Array();
    var valores = new Array();

    $(document).ready(function() {
    axios.get(url)
        .then(response => {
            teste = response.data;
            $.each(response.data, function(index, value){
                datas.push(index);
                valores.push(value)
            });

            var ctx = document.getElementById('myChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: datas,
                    datasets: [
                        {
                            label: 'Movimentações',
                            backgroundColor: 'transparent',
                            borderColor: 'green',
                            data: valores
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
            })
    })
</script>
@endsection