@extends('layouts/layout')

@section('content')

<div class="ui container">
    <div class="ui grid centered">
        <div class="dividing header"> </div>
    <div class="ui items">
        <div class="item">
          <div class="image">
              @if($veiculo->tipo == 'Carro')
            <img src="/images/Veiculos/carro.png">
            @else 
            <img src="/images/Veiculos/moto.png">
            @endif
          </div>
          <div class="content">
            <span class="meta">{{$veiculo->tipo}}</span>
            <br>
            <br>
            <a class="header ui column row">{{$veiculo->modelo}}</a>
            <div class="meta">
              <span>{{$veiculo->marca}}</span>
              <br>
              <br>
              <span>{{$veiculo->placa}}</span>
            </div>
            <div class="description">
                <p>Ano: {{$veiculo->ano}}</p> 
                <p>Cor: {{$veiculo->cor}}</p> 
                
            </div>
            <div class="extra">
                <p>Quilometragem atual: {{$veiculo->kmatual}} KM</p> 
                <div class="ui right floated">
                    <button class="ui blue button" onclick="qrcode({{$veiculo->id}},'{{$veiculo->modelo}}');"><i class="qrcode icon"></i>QR Code</button>
                  </div>
                  <button class="green basic button ui"> <a href="{{route('veiculos.edit',$veiculo->id)}}"><i class="pencil alternate icon"></i></a></button>
                  <form style="display: inline;" action="{{route('veiculos.destroy',$veiculo->id)}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="red basic button ui"><i class="eraser icon"></i></button>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <canvas id="myChart" width="30" height="30"></canvas>
</div>


<div class="ui basic modal">
  <div class="ui icon header centered grid">
    <p id="nomeVeiculo"></p>
  </div>
  <div class="content ui centered grid" id="divqrcode"></div>
  <div class="actions">
    <button class="ui blue basic cancel inverted button" onclick="imprimirQrcode();">Imprimir</button>
    <button class="ui red basic cancel inverted button" onclick="fecharModal();">Fechar</button>
  </div>
</div>

@endsection

@section('javascript')
<script>
function fecharModal(){
    $('.ui.basic.modal').modal('hide');
  }

function qrcode(id, nome){
  $('#divqrcode').load('http://localhost:8000/api/veiculos/qrcode/'+id,function(){
    $('#nomeVeiculo').text(nome);
    $('.ui.basic.modal').modal('show');
  });
}

function imprimirQrcode(){
 $('#divqrcode').printElement();
}

var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                datasets: [
                    {
                        label: 'Movimentações',
                        backgroundColor: 'transparent',
                        borderColor: 'green',
                        data: [12, 16, 8, 18, 15, 20, 13, 12, 16, 19, 15, 16]
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