@extends('/layouts/app')

@section('search')

    <form class="form-inline my-2 my-lg-0" action="" method="get">
        <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Rechercher..." value="{{ request('search') }}">
    </form>

@endsection

@section('title')

    Questions

@endsection

@section('banner')

    <h1>Questions</h1><br>

@endsection

@section('content')

    @foreach($questions as $question)
    <article class="p-3 mb-2 bg-light text-dark">
        <h4>
            <img src="https://i.pravatar.cc/50" alt="Profile Picture"> 
            <a class="link-dark" href="/authors/{{ $question->user->username }}">{{ $question->user->username }}</a>
        </h4>
        <small>
            Intérêt: <a class="link-secondary" href="categories/{{ $question->category->slug }}">{{ $question->category->name }}</a>
        </small>
        <div>
            <strong>{{ $question->body }}</strong>
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

    {{ $questions->links('pagination::bootstrap-4') }}

@endsection
