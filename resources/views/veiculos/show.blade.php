@extends('layouts/layout')

@section('content')
<div class="ui container">
  <div class="ui grid centered">
    <div class="dividing header"> </div>
    <div class="ui top sixteen wide column center aligned" style="background-color: rgb(41, 41, 41);color: #FFFFFF;">
      <h2>Informações do Veículo</h2>
    </div>
    
    <div class="ui items">
      <div class="item">
        <div class="image">
          @if($veiculo->imagem != NULL)
          <img src="{{asset('/Images/veiculos')}}/{{$veiculo->imagem}}">

          @else
          @if($veiculo->tipo == 'Carro')
          <img width="500" height="500" src="/images/Veiculos/carro.png">
          @else
          <img width="500" height="500" src="/images/Veiculos/moto.png">
          @endif
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
              <button class="ui blue button" onclick="qrcode({{$veiculo->id}},'{{$veiculo->modelo}}');"><i
                  class="qrcode icon"></i>QR Code</button>
            </div>
            <button class="green basic button ui"> <a href="{{route('veiculos.edit',$veiculo->id)}}"><i
                  class="pencil alternate icon"></i></a></button>
            <form style="display: inline;" action="{{route('veiculos.destroy',$veiculo->id)}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="delete">
              <button type="submit" class="red basic button ui"><i class="eraser icon"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="dividing"> </div>
    <div class="ui sixteen wide column center aligned" style="background-color: rgb(41, 41, 41);color: #FFFFFF;">
      <h2>Estatisticas</h2>
    </div>
  </div>
  <div class="dividing"> </div>
  <div class="ui segment">
    <div class="ui tabular menu">
      <a class="item active" data-tab="first">Saidas</a>
      <a class="item" data-tab="second">Entradas</a>
      <a class="item" data-tab="third">Gráfico de uso</a>
    </div>

    <div class="ui bottom tab segment active" data-tab="first">
      @if(!isset($saidas[0]))
      <p>O veículo não possui registros de movimentação.</p>
      @else
      <table class="ui table unstackable" id="tabela1">
        <thead>
          <tr>
            <th>No</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Cargo</th>
            <th>Data</th>
            <th>Hora</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($saidas as $key => $saida)
          <tr>
            <td>{{ $saida->id }}</td>
            <td>{{ $saida->name }}</td>
            <td>{{ $saida->email }}</td>
            <td><label class="ui green horizontal label">{{ $saida->cargo }}</label></td>
            <td>
              <p>
                {{Carbon\Carbon::parse($saida->created_at)->format('d/m/Y')}} </p>
            </td>
            <td>
              <p>
                {{Carbon\Carbon::parse($saida->created_at)->format('h:m')}} </p>
            </td>
            <td>
              @if($saida->entrada_id == NULL)
              <p>Em uso!</p>
              @else
              <p>Disponível!</p>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif

    </div>
    <div class="ui bottom tab segment" data-tab="second">

      @if(!isset($entradas[0]))
      <p>O veículo não possui registros de movimentação.</p>
      @else
      <table class="ui table unstackable" id="tabela2">
        <thead>
          <tr>
            <th>No</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Cargo</th>
            <th>Data</th>
            <th>Hora</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($entradas as $key => $entrada)
          <tr>
            <td>{{ $entrada->id }}</td>
            <td>{{ $entrada->name }}</td>
            <td>{{ $entrada->email }}</td>
            <td><label class="ui green horizontal label">{{ $entrada->cargo }}</label></td>
            <td>
              <p>
                {{Carbon\Carbon::parse($saida->created_at)->format('d/m/Y')}} </p>
            </td>
            <td>
              <p>
                {{Carbon\Carbon::parse($saida->created_at)->format('h:m')}} </p>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
    <div class="ui bottom tab segment" data-tab="third" >
      <canvas id="myChart" style="width:500px;height:500px;">O veículo não possui registros de movimentação.</canvas>
    </div>
  </div>
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
  //tab entradas/saidas
  $('.menu .item')
    .tab();

  $('#tabela1').DataTable({
    responsive: true
  });
  $('#tabela2').DataTable({
    responsive: true
  });

  function fecharModal() {
    $('.ui.basic.modal').modal('hide');
  }

  function qrcode(id, nome) {
    $('#divqrcode').load('http://localhost:8000/api/veiculos/qrcode/' + id, function() {
      $('#nomeVeiculo').text(nome);
      $('.ui.basic.modal').modal('show');
    });
  }

  function imprimirQrcode() {
    $('#divqrcode').printElement();
  }

  var url = "{{route('veiculos.grafico',$veiculo->id)}}";
  var datas = new Array();
  var valores = new Array();

  $(document).ready(function() {
    axios.get(url)
      .then(response => {
        $.each(response.data, function(index, value) {
          datas.push(index);
          valores.push(value)
        });

        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: datas,
            datasets: [{
              label: 'Movimentações',
              backgroundColor: 'transparent',
              borderColor: 'green',
              data: valores
            }]
          },
          responsive: true,
          options: {
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  stepSize: 1,
                }
              }]
            }
          }
        });
      })
  })
</script>
@endsection