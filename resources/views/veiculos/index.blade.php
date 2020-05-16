@extends('layouts/layout')

@section('content')

<div class="ui container">
  
<table class="ui selectable table">
  <thead>
    <tr>
      <th>QRCode</th>
      <th>Tipo</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Ano</th>
      <th>Cor</th>
      <th>Placa</th>
      <th>Tanque</th>
      <th>Renavam</th>
      <th>KM Cadastro</th>
      <th>KM Atual</th>
      <th class="right aligned"></th>
    </tr>
  </thead>
  <tbody>
      @foreach ($veiculosCadastrados as $veiculo)
      <tr>
      <td><button class="blue button ui" onclick="qrcode({{$veiculo->id}},'{{$veiculo->modelo}}');">QR</button></td>
          <td>{{$veiculo->tipo}}</td>
          <td>{{$veiculo->marca}}</td>
          <td>{{$veiculo->modelo}}</td>
          <td>{{$veiculo->ano}}</td>
          <td>{{$veiculo->cor}}</td>
          <td>{{$veiculo->placa}}</td>
          <td>{{$veiculo->tanque}}</td>
          <td>{{$veiculo->renavam}}</td>
          <td>{{$veiculo->kmcadastro}}</td>
          <td>{{$veiculo->kmatual}}</td>
          <td class="right aligned">
              <button class="orange basic button ui"> <a href="{{route('veiculos.show',$veiculo->id)}}">Ver</a></button>
              <button class="green basic button ui"> <a href="{{route('veiculos.edit',$veiculo->id)}}">Editar</a></button>
              <form style="display: inline;" action="{{route('veiculos.destroy',$veiculo->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <button type="submit" class="red basic button ui">Remover</button>
              </form>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>
</div>

<div class="ui basic modal">
  <div class="ui icon header centered grid">
    <p id="nomeVeiculo"></p>
  </div>
  <div class="content ui centered grid" id="divqrcode"></div>
  <div class="actions">
    <button class="ui blue basic cancel inverted button" onclick="imprimirQrcode();">Imprimir</button>
  </div>
</div>

@endsection

@section('javascript')

<script>
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