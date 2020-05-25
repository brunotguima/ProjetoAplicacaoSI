@extends('layouts.layout')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <div class="ui middle aligned center aligned grid">
        <div class="column" style="max-width: 450px; margin-top: 20px">
            <h2 class="ui teal center aligned header">
                Login
            </h2>
            <form class="ui large form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="ui fluid large teal submit button">Login</div>
                </div>
                <div class="ui error message"></div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
      $(".ui.form").form({
        fields: {
          email: {
            identifier: "email",
            rules: [{
                type: "empty",
                prompt: "Digite seu e-mail"
              },
              {
                type: "email",
                prompt: "Por favor, digite um e-mail válido"
              }
            ]
          },
          password: {
            identifier: "password",
            rules: [{
                type: "empty",
                prompt: "Por favor, digite sua senha"
              },
              {
                type: "length[6]",
                prompt: "Sua senha deve ter no mínimo, 6 caracteres"
              }
            ]
          }
        }
      });
    });
    </script>
    </body>

</html>
@endsection