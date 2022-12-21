@extends('/layouts/app')

@section('title')

    Publication

@endsection

@section('banner')

    <h1>Publication: </h1><br>

@endsection

@section('content')

    <article>
        <div>
            {{ $post->body }}
        </div>

        <a href="/" class="btn btn-dark">Retour</a>
        
    </article>

@endsection
