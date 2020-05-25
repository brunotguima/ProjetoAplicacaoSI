<!-- Menu superior -->
@if(Auth::check())
<div class="ui sidebar inverted vertical menu">
  @if(Request::segment(1) == (''))
  <a href="/" class="active item" id="inicio">
    Inicio
  </a>
  @else
  <a href="/" class="item" id="inicio">
    Inicio
  </a>
  @endif

  @canany(['veiculo-list', 'veiculo-edit', 'veiculo-delete', 'veiculo-create'])
  @if(Request::segment(1) == ('veiculos'))
  <a href="/veiculos" class="active item" id="veiculos">
    Veiculos
  </a>
  @else
  <a href="/veiculos" class="item" id="veiculos">
    Veiculos
  </a>
  @endif
  @endcanany

  @if(Request::segment(1) == ('movimentacao'))
  <a href="/" class="active item" id="movimentacoes">
    Movimentações
  </a>
  @else
  <a href="/" class="item" id="movimentacoes">
    Movimentações
  </a>
  @endif

  @canany(['user-list', 'user-edit', 'user-delete', 'user-create'])
  @if(Request::segment(1) == ('users'))
  <a href="{{ route('users.index') }}" class="active item">
    Usuários
  </a>
  @else
  <a href="{{ route('users.index') }}" class="item">
    Usuários
  </a>
  @endif
  @endcanany

  @canany(['role-list', 'role-edit', 'role-delete', 'role-create'])
  @if(Request::segment(1) == ('roles'))
  <a href="{{ route('roles.index') }}" class="active item">
    Tipos Func.
  </a>
  @else
  <a href="{{ route('roles.index') }}" class="item">
    Tipos Func.
  </a>
  @endif
  @endcanany

  <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
  </a>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
@else
<div class="ui sidebar inverted vertical menu">
  <a class="ui right aligned item" href="{{ route('login') }}" class="item">
    Login
  </a>
</div>
@endif
<!--Fim menu superior -->