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
    <a href="{{ route('users.index') }}" class="item">
      Usuários
    </a>
    <a href="{{ route('roles.index') }}" class="item">
      Tipos Func.
    </a>
    <div class="right menu">
      <button class="ui secondary basic button">
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
