<!DOCTYPE html>
<html lang="pt-br">
  <head>
    @include('partials/_head')
  </head>
  
  <body>  
    <div class="ui container">
        @include('./partials/_nav') 
        @yield('content')
    </div> 

    {{-- <footer>
        @include('partials._footer')
    </footer> --}}

    @include('./partials/_javascript')
    @yield('scripts')
  </body>
</html>
