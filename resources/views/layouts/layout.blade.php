<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema de Controle de Frota</title>
  <link href="{{ asset('css/semantic.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <header class="ui header">
<div class="ui container">
  <!-- Menu superior -->
  @if(Auth::check())
<div class="ui pointing menu">
  <a href="/" class="active item" id="inicio">
    Inicio
  </a>
  <a href="/veiculos" class="item" id="veiculos">
    Veiculos
  </a>
  <a href="/movimentacao" class="item" id="movimentacoes">
    Movimentações
  </a>
  <div class="right menu">
    <button class="ui secondary button">
    <a href="">{{Auth::user()->name}}</a>
    </button>
<form action="/logout" method="post">
  <input type="submit" class="ui secondary basic button" value="Logout">
  {{ csrf_field() }}
</form>
  </div>
</div>
@endif
</div>
</header>
  <!--Fim menu superior -->
  <main>
  <div class="ui container">
    @if(Auth::Check())
    @yield('content')   
   @else
       <div class="ui container">
        <div class="ui vertically grid">
          <div class="row"> </div>
           <div class="row">
            <img class="ui small rounded centered image" src="/Images/logo.png" sizes="150px">
           </div>
           <div class="two column row">
            <button class="fluid ui massive primary basic button"> <a href="{{route('login')}}">Faça o Login</a></button>
            <button class="fluid ui massive positive basic button"><a href="{{route('register')}}">Registre-se</a></button>
          </div>
          <div class="four column row"></div>
         </div>
       </div>
   @endif
  </div>
  </main>
  <footer>

  </footer>
  <script src="{{ asset('js/semantic.js') }}" type="text/js"></script>
  <script>
    var url_atual = window.location.href;
    if(url_atual == 'localhost:8000/veiculos'){
      $('#inicio').removeClass('active');
      $('#veiculos').addClass('active');
    }
  </script>
</body>
</html>