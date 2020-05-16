<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('partials/_head')
  </head>
  <body>  
        @include('./partials/_nav')
        <div class="row"> </div>
          <div class="ui container">
            @if(Auth::Check())
            @yield('content')   
           @else
               <div class="ui container">
                <div class="ui vertically grid">
                  <div class="row"> </div>
                   <div class="row">
                     @if(Request::segment(1) == ('login'||'register'))
                     @yield('contentAuth')
                     @else
                    <img class="ui small rounded centered image" src="/Images/Logo.png" sizes="150px">
                   </div>
                   <div class="two column row">
                    <button class="fluid ui massive primary basic button"> <a href="{{route('login')}}">Faça o Login</a></button>
                    <button class="fluid ui massive positive basic button"><a href="{{route('register')}}">Registre-se</a></button>
                  </div>
                  <div class="four column row"></div>
                 </div>
               </div>
               @endif
           @endif
          </div>
    <footer>
        @include('partials._footer')
    </footer> 

    @include('./partials/_javascript')

  </body>
  

  
  <footer>

  </footer>
</body>
</html>