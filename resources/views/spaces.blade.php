@extends('/layouts/app')

@section('title')

    Découvrir les Espaces

@endsection

@section('content')

    <h1><strong>Découvrir les Espaces</strong></h1>
    <a href="/create/space" class="btn btn-dark"><strong>Créer un Espace</strong></a>
    <a href="/my-spaces" class="btn btn-dark"><strong>Consulter mes Espaces</strong></a>
    <br><br>
    @php
        $spaces = \App\Models\Space::all();                    
    @endphp
    @foreach ($spaces as $space)
    <div class="card">
        <div class="card-body">
            <h4><img src="storage/uploads/{{ $space->icon }}" alt=""><a href="/space/{{ $space->id }}" class="link-dark fw-bold text-decoration-none"> {{ $space->name }}</a></h4>
        <small>Créer par <a href="/authors/{{ $space->user->username }}" class="link-dark text-decoration-none">{{ $space->user->username}}</a></small>
        </div>
    </div>
    <br>
    @endforeach

@endsection
