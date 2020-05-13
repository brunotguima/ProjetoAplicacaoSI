@extends('layouts/layout')

@section('content')


<form class="form-horizontal" action="/veiculos" method="POST" >
  {{ csrf_field() }}
    <fieldset>
    
    <legend>Cadastro de Veículo</legend>
    
    <div class="form-group">
      <label class="col-md-4 control-label" for="tipo">Selecione o Tipo do Veículo:</label>
      <div class="col-md-4">
        <select id="tipo" name="tipo" class="form-control">
          <option value="carro">Carro</option>
          <option value="moto">Moto</option>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-md-4 control-label" for="marca">Marca:</label>  
      <div class="col-md-4">
      <input id="marca" name="marca" type="text" placeholder="Digite a marca" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="modelo">Digite o modelo:</label>  
      <div class="col-md-4">
      <input id="modelo" name="modelo" type="text" placeholder="Digite o modelo" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="ano">Digite o ano:</label>  
      <div class="col-md-4">
      <input id="ano" name="ano" type="text" placeholder="ano" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="cor">Digite a cor:</label>  
      <div class="col-md-4">
      <input id="cor" name="cor" type="text" placeholder="cor" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="renavam">Digite o renavam do veiculo:</label>  
      <div class="col-md-4">
      <input id="renavam" name="renavam" type="text" placeholder="renavam" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="kmcadastro">Digite a quilometragem atual:</label>  
      <div class="col-md-4">
      <input id="kmcadastro" name="kmcadastro" type="text" placeholder="KM" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="tanque">Digite a litragem do tanque:</label>  
      <div class="col-md-4">
      <input id="tanque" name="tanque" type="text" placeholder="Qtde em Litros" class="form-control input-md" required="">
        
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="placa">Digite a placa:</label>  
      <div class="col-md-4">
      <input id="placa" name="placa" type="text" placeholder="placa" class="form-control input-md" required="">
        
      </div>
    </div>

    <input type="submit" value="Enviar">
    
    </fieldset>
    </form>
    

@endsection