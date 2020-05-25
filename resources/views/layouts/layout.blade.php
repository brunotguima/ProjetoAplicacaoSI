<!DOCTYPE html>
<html lang="pt-br">

<head>
  @include('partials/_head')
</head>

<body>
  <div class="pusher">
    <div class="ui top attached demo menu">
      <a class="item" onclick="$('.ui.sidebar').sidebar('toggle')">
        <i class="sidebar icon"></i>
        Menu
      </a>
    </div>
    <div class="ui fluid container">
      @include('./partials/_nav')
      @yield('content')
    </div>

    {{-- <footer>
        @include('partials._footer')
    </footer> --}}

    @include('./partials/_javascript')
    @yield('scripts')
  </div>
</body>

</html>