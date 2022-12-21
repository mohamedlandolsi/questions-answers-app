@extends('layouts.app')

@section('title')
    Acceuil
@endsection

@section('content')
    <h3>A découvrir</h3>
  <div class="list-group">
    <a href="/publications" class="list-group-item list-group-item-action">Découvrir le contenu</a>
    <a href="/my-spaces" class="list-group-item list-group-item-action">Mes Espaces</a>
    <a href="/stats" class="list-group-item list-group-item-action">Consulter mes contenus et statistiques</a>
  </div>
  <br><br>
  <h3>Se que tu peux faire</h3>
  <div class="list-group">
    <a href="/post/create" class="list-group-item list-group-item-action">Créer une Publication</a>
    <a href="/question" class="list-group-item list-group-item-action">Poser une Question</a>
    <a href="/create/space" class="list-group-item list-group-item-action">Créer un Espace</a>
  </div>

@endsection
