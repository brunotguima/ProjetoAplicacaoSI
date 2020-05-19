<header class="ui menuemcima">
  <div class="ui container">
    <!-- Menu superior -->
    @if(Auth::check())
  <div class="ui pointing menu">

    @if(Request::segment(1) == (''))
    <a href="/" class="active item" id="inicio">
      Inicio
    </a>
    @else 
    <a href="/" class="item" id="inicio">
      Inicio
    </a>
    @endif

    @if(Request::segment(1) == ('veiculos'))
    <a href="/veiculos" class="active item" id="veiculos">
      Veiculos
    </a>
    @else 
    <a href="/veiculos" class="item" id="veiculos">
      Veiculos
    </a>
    @endif 

    @if(Request::segment(1) == ('movimentacao'))
    <a href="/movimentacao" class="active item" id="movimentacoes">
      Movimentações
    </a>
    @else 
    <a href="/movimentacao" class="item" id="movimentacoes">
      Movimentações
    </a>
    @endif

    @if(Request::segment(1) == ('users'))
    <a href="{{ route('users.index') }}" class="active item">
      Usuários
    </a>
    @else 
    <a href="{{ route('users.index') }}" class="item">
      Usuários
    </a>
    @endif

    @if(Request::segment(1) == ('roles'))
    <a href="{{ route('roles.index') }}" class="active item">
      Tipos Func.
    </a>
    @else 
    <a href="{{ route('roles.index') }}" class="item">
      Tipos Func.
    </a>
    @endif

    <div class="ui right aligned dropdown item">
      {{Auth::user()->name}}
      <i class="dropdown icon"></i>
      <div class="menu">
        <div class="item">
          <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
          </a>
        </div>
      </div>
    </div>
  </div>
  @endif
  </div>
  </header>
  <!--Fim menu superior -->
