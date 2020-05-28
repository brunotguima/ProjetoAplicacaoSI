@extends('/layouts/layout')

@section('content')
<h2 class="ui dividing header">Ver Usuário</h2>

<div class="ui card">
    <div class="image" style="background-color: grey;">
    </div>

    <div class="content">
        <a class="header">{{ $role->name }}</a>
    </div>
    <div class="extra content">
        <label>Permissões:</label>
        <br>
        @if(!empty($rolePermissions))
        @foreach($rolePermissions as $v)
        <div class="row" style="margin-top: 3px">
            <label class="ui green horizontal label">{{ $v->name }}</label>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection