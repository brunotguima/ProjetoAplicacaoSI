<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('partials/_head')
  </head>
  <body>  
    <div class="ui container">
        @include('./partials/_nav')
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
    </div> 
    <footer>
        @include('partials._footer')
    </footer> 

    @include('./partials/_javascript')

  </body>
  

  
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