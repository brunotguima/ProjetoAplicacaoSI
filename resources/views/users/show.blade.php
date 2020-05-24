@extends('/layouts/layout')

@section('content')
<h2 class="ui dividing header">Ver Usuário</h2>

<div class="ui card">
    <div class="image" style="background-color: grey;">
      
    </div>
    <div class="content">
      <a class="header">{{ $user->name . ' (' . $user->id . ')' }}</a>
      <div class="meta">
        <span class="date">{{ $user->email }}</span>
        <br>
        <span class="date">{{ $user->cargo }}</span>
      </div>
      <div class="description">
        <strong>Permissões:</strong>
        @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
                <label class="ui green horizontal label">{{ $v }}</label>
            @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection