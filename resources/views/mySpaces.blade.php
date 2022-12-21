@extends('/layouts/app')

@section('title')

    Mes Espaces

@endsection

@section('content')

    <h1><strong>Vos Espaces</strong></h1>
    <a href="/spaces" class="btn btn-dark"><strong>Consulter les Espaces</strong></a>
    <a href="/create/space" class="btn btn-dark"><strong>Créer un Espace</strong></a>
    <br><br>
    @php
        $spaces = \App\Models\Space::all();
    @endphp
    @foreach ($spaces as $space)
    <div>
        <h4><img src="storage/uploads/{{ $space->icon }}" alt=""><a href="/space/{{ $space->id }}" class="link-dark fw-bold text-decoration-none"> {{ $space->name }}</a></h4>
    </div>
    <br>
    @endforeach

@endsection
