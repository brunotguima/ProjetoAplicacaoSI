@extends('layouts/layout')

@section('content')

<div class="ui container">
<form class="ui form" action="/veiculos" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="dividing header"></div>
  <h2 class="ui dividing header"><legend>Cadastro de Veículo</legend></h2>
  <div class="dividing header"></div>
    
    
    <div class="field ui six grid">
      <label for="tipo">Selecione o Tipo do Veículo:</label>
        <select id="tipo" name="tipo" class="ui dropdown">
          <option class="item" value="carro">Carro</option>
          <option class="item" value="moto">Moto</option>
        </select>
    </div>
    
    <div class="field ui six grid">
      <label>Marca:</label>  
      <input id="marca" name="marca" type="text" placeholder="Digite a marca" required="">
    </div>
    
    <div class="field ui six grid">
      <label for="modelo">Digite o modelo:</label>  
      <input id="modelo" name="modelo" type="text" placeholder="Digite o modelo"  required="">
    </div>
    
    <div class="field ui six grid">
      <label for="ano">Digite o ano:</label>  
      <input id="ano" name="ano" type="text" placeholder="Digite o ano" required="">
    </div>
    
    <div class="field ui six grid">
      <label for="cor">Digite a cor:</label>  
      <input id="cor" name="cor" type="text" placeholder="Cor" required="">
    </div>
    
    <div class="field ui six grid">
      <label for="renavam">Digite o renavam do veiculo:</label>  
      <input id="renavam" name="renavam" type="text" placeholder="Renavam" required="">
    </div>
    
    <div class="field ui six grid">
      <label for="kmcadastro">Digite a quilometragem atual:</label>  
      <input id="kmcadastro" name="kmcadastro" type="text" placeholder="KM" required="">
    </div>
    
    <div class="field ui six grid">
      <label for="tanque">Digite a litragem do tanque:</label>  
      <input id="tanque" name="tanque" type="text" placeholder="Qtde em Litros" required="">
    </div>
    
    <div class="field ui six grid">
      <label for="placa">Digite a placa:</label>  
      <input id="placa" name="placa" type="text" placeholder="Placa"  required="">
    </div>

    <div class="field ui six grid">
      <label for="imagem">
          <i class="file icon"></i>
          Insira uma Imagem <span>(Opcional)</label>
      <input class="ui icon button" type="file" name="imagem" id="file" accept="image/*">
  </div>

    <input class="ui button" type="submit" value="Enviar">
    
    </form>
    
  </div>
@endsection
