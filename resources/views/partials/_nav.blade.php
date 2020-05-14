<div class="ui pointing menu">
  <a href="/" class="active item">
    Home
  </a>
  <a href="{{ route('users.index') }}" class="item">
    Usuários
  </a>
  <a href="{{ route('roles.index') }}" class="item">
    Tipos Func.
  </a>
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

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</div>