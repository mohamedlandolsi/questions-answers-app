@extends('/layouts/app')

@section('search')

    <form class="form-inline my-2 my-lg-0" action="" method="get">
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Rechercher..." value="{{ request('search') }}">
    </form>

@endsection

@section('title')
    {{ $space->name }}
@endsection

@section('content')
    <div class="card text-white bg-dark mb-3">
        <img class="card-img-top" src="/storage/{{ $space->banner }}" alt="Photo de Couverture">
        <div class="card-body">
            <img src="/storage/{{ $space->icon }}" alt="Icône" class="rounded">
            <button class="btn btn-success">Suivre l'espace</button>
        <h3 class="card-title">{{ $space->name }}</h3>
        <p class="card-text">{{ $space->description }}</p>
        <small>Créer par <strong>{{ $space->user->username }}</strong></small>
        </div>
    </div>

    <div>
        <a href="/space/{{ $space->id }}/edit" class="btn btn-dark">Modifier l'espace</a>
        <a href="/post/create" class="btn btn-dark">Ajouter une Publication</a>
    </div><br><br>

    @php
        $posts = \App\Models\Post::all();             
    @endphp

    @foreach($posts as $post)
    @if ( $post->user_id == $space->user_id )
    <article class="p-3 mb-2 bg-light text-dark">
        <h4><img src="https://i.pravatar.cc/50" alt="Profile Picture"> <a class="link-dark text-decoration-none" href="/authors/{{ $post->user->username }}">{{ $post->user->username }}</a></h4>
        <small>
            Intérêt: <a class="link-secondary text-decoration-none" href="categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </small>
        <div>
            <strong>{{ $post->body }}</strong>
        </div>

        <br>

        <h5>Réponses: </h5>
        <div>
            <header>
                <img src="https://i.pravatar.cc/30" alt="">
                <strong> cosme </strong> - 
                <small>8 months ago</small>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ducimus laudantium illum modi est fugit. Totam perferendis, aut nobis tempora quod soluta eos velit quia itaque laborum ipsa est repudiandae?</p>
            </header>
        </div>
        
    </article>
    
    <br><hr><br>
    @endif
    @endforeach

    {{-- {{ $posts->links('pagination::bootstrap-4') }} --}}
    
@endsection
