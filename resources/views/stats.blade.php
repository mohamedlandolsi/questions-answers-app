@extends('/layouts/app')

@section('title')

    Contenus et Statistiques

@endsection

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col"><h2>Votre Contenu</h2></th>
            <th scope="col" colspan="2">
                <label for="filtrer">Filtrer</label>
                <select name="filtrer" id="filtrer">
                    <option value="tous" selected>Tous les Types</option>
                    <option value="questions">Questions</option>
                    <option value="publication">Publication</option>
                </select>
            </th>
            <th scope="col" colspan="2">
                <label for="trier">Trier</label> 
                <select name="trier" id="trier">
                    <option value="created_at" selected>Date de Publication</option>
                    <option value="vues">Vues</option>
                    <option value="votes_positifs">Votes Positifs</option>
                    <option value="commentaires">Commentaires</option>
                    <option value="partages">Partages</option>
                </select>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
            <td scope="row">
                {!! ucwords($post->type->slug) !!} .
                <br>
                <strong>{!! $post->body !!}</strong>
            </td>
            <td align="center">
                Vues
                <br>
                <strong>1</strong>
            </td>
            <td align="center">
                Votes Positifs
                <br>
                <strong>-</strong>
            </td>
            <td align="center">
                Commentaires
                <br>
                <strong>-</strong>
            </td>
            <td align="center">
                Partages
                <br>
                <strong>-</strong>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $posts->links('pagination::bootstrap-4') }}

@endsection
