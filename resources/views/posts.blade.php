@extends('/layouts/app')

@section('search')

    <form class="form-inline my-2 my-lg-0" action="" method="get">
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Rechercher..." value="{{ request('search') }}">
    </form>

@endsection

@section('title')

    Contenus

@endsection

@section('banner')

    <h1>Contenus</h1><br>

@endsection

@section('content')

    <div>
        <a href="/post/create" class="btn btn-dark">Ajouter une Publication</a>
        <a href="/question" class="btn btn-dark">Ajouter une Question</a>
    </div><br><br>

    <select name="type_id" id="type_id">
        @php
            $types = \App\Models\Type::all();                    
        @endphp

        @foreach ($types as $type)
            <option value="{{ $type->id }}" {{ old('category_id') == $type->id ? 'selected' : '' }}>{{ ucwords($type->type) }}</option>
        @endforeach
    </select>

    @foreach($posts as $post)
    
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

    @endforeach

    {{ $posts->links('pagination::bootstrap-4') }}

@endsection
