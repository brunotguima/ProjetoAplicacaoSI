<!-- Menu superior -->
@if(Auth::check())
<div class="ui inverted left vertical sidebar labeled icon menu" style="overflow: visible !important;">
  @if(Request::segment(1) == (''))
  <a href="/" class="active item" id="inicio">
    <i class="home icon"></i>
    Inicio
  </a>
  @else
  <a href="/" class="item" id="inicio">
    <i class="home icon"></i>
    Inicio
  </a>
  @endif

  @canany(['veiculo-list', 'veiculo-edit', 'veiculo-delete', 'veiculo-create'])
  @if(Request::segment(1) == ('veiculos'))
  <a href="/veiculos" class="active item" id="veiculos">
    <i class="car icon"></i>
    Veiculos
  </a>
  @else
  <a href="/veiculos" class="item" id="veiculos">
    <i class="car icon"></i>
    Veiculos
  </a>
  @endif
  @endcanany

  @if(Request::segment(1) == (''))
  <a href="/" class="active item" id="movimentacoes">
    <i class="exchange icon"></i>
    Movimentações
  </a>
  @else
  <a href="/" class="item" id="movimentacoes">
    <i class="exchange icon"></i>
    Movimentações
  </a>
  @endif

  @canany(['user-list', 'user-edit', 'user-delete', 'user-create'])
  @if(Request::segment(1) == ('users'))
  <a href="{{ route('users.index') }}" class="active item">
    <i class="users icon"></i>
    Usuários
  </a>
  @else
  <a href="{{ route('users.index') }}" class="item">
    <i class="users icon"></i>
    Usuários
  </a>
  @endif
  @endcanany

  @canany(['role-list', 'role-edit', 'role-delete', 'role-create'])
  @if(Request::segment(1) == ('roles'))
  <a href="{{ route('roles.index') }}" class="active item">
    <i class="tasks icon"></i>
    Tipos Func.
  </a>
  @else
  <a href="{{ route('roles.index') }}" class="item">
    <i class="tasks icon"></i>
    Tipos Func.
  </a>
  @endif
  @endcanany

  @canany(['mecanico-list', 'mecanico-edit', 'mecanico-delete', 'mecanico-create'])
  @if(Request::segment(1) == ('mecanicos'))
  <a href="{{ route('mecanicos.index') }}" class="active item">
    <i class="wrench icon"></i>
    Mecânicos
  </a>
  @else
  <a href="{{ route('mecanicos.index') }}" class="item">
    <i class="wrench icon"></i>
    Mecânicos
  </a>
  @endif
  @endcanany

  @canany(['manutencao-list', 'manutencao-edit', 'manutencao-delete', 'manutencao-create'])
  @if(Request::segment(1) == ('manutencoes'))
  <a href="{{ route('manutencoes.index') }}" class="active item">
    <i class="cogs icon"></i>
    Manutenções
  </a>
  @else
  <a href="{{ route('manutencoes.index') }}" class="item">
    <i class="cogs icon"></i>
    Manutenções
  </a>
  @endif
  @endcanany

  @canany(['ver-estatisticas'])
  @if(Request::segment(1) == ('estatistica'))
  <a href="{{ route('estatisticas.index') }}" class="active item">
    <i class="chart line icon"></i>
    Estatisticas
  </a>
  @else
  <a href="{{ route('estatisticas.index') }}" class="item">
    <i class="chart line icon"></i>
    Estatisticas
  </a>
  @endif
  @endcanany

  <div class="ui dropdown item">
    <i class="user icon"></i>
    {{Auth::user()->name}}
    <i class="dropdown icon"></i>
    <div class="menu">
        <a class="inverted item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
    </div>
  </div>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
@else
<div class="ui inverted left vertical sidebar menu" style="overflow: visible !important;">
  <a href="{{ route('login') }}" class="item">
    Login
  </a>
</div>
@endif
<!--Fim menu superior -->