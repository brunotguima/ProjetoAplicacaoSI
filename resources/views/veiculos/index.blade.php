@extends('layouts/layout')

@section('content')

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
        <td><a href=""><i>a</i></a></td>
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
                <button class="red basic button ui"> <a href="{{route('veiculos.destroy',$veiculo->id)}}">Remover</a></button>

            </td>
          </tr>
        @endforeach
    </tbody>
  </table>

