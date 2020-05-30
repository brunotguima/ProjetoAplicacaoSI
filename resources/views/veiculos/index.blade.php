@extends('layouts/layout')

@section('content')

<div class="ui container">
  <div class="dividing header"></div>
  <h2 class="ui dividing header">Gerenciamento de Veículos <a href="{{route('veiculos.create')}}"><i class="plus red icon" style="float: right"></i></a></h2>
<div class="ui grid">

  <div class="ui stackable  grid">
  @foreach ($veiculosCadastrados as $veiculo)
  <div class="four wide column">
  <div class="ui card">
    <div class="image">
      @if($veiculo->imagem != NULL)
      <img width="500" height="500" src="{{asset('/Images/veiculos')}}/{{$veiculo->imagem}}">

      @else
      @if($veiculo->tipo == 'Carro')
      <img src="{{asset('/images/Veiculos/carro.png')}}">
      @else 
      <img src="{{asset('/images/Veiculos/moto.png')}}">
      @endif
      @endif
    </div>
    <div class="content">
      <a class="header ui two row" style="height: 50px;">{{$veiculo->marca}} {{$veiculo->modelo}}</a>
      <div class="meta">
        <span>{{$veiculo->placa}}</span>
      </div>
      <div class="description">
       <p>{{$veiculo->ano}}</p> 
      </div>
      <div class="description">
       <p>{{$veiculo->cor}}</p> 
      </div>
      <div class="description">
        <p>{{$veiculo->tipo}}</p> 
       </div>
    </div>
    <div class="extra content">
     <p>Quilometragem atual: {{$veiculo->kmatual}} KM</p> 
    </div>
    <div class="extra content center aligned page grid">
      <button class="ui blue button" onclick="qrcode({{$veiculo->id}},'{{$veiculo->modelo}}');"><i class="qrcode icon"></i>QR Code</button>
    </div>
    <div class="extra content center aligned page grid">
      <button class="orange icon button ui"> <a href="{{route('veiculos.show',$veiculo->id)}}"><i class="eye icon"></i></a></button>
              <button class="green icon button ui"> <a href="{{route('veiculos.edit',$veiculo->id)}}"><i class="pencil alternate icon"></i></a></button>
              <form style="display: inline;" action="{{route('veiculos.destroy',$veiculo->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button type="submit" class="red icon button ui"><i class="eraser icon"></i></button>
              </form>
    </div>
  </div>
</div>
  @endforeach
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
</script>
@endsection