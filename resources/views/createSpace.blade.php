@extends('/layouts/app')

@section('title')

    Créer un Espace

@endsection

@section('banner')

    <h1>Créer votre Espace: </h1><br>

@endsection

@section('content')

    <form action="/my-spaces" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" rows="3" name="name" value="{{ old('name') }}" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description brève</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
          </div>
          <div class="mb-3">
              <label for="icon" class="form-label">Icône</label>
              <input type="file" name="icon" id="icon" class="form-control-file">
          </div>
          <div class="mb-3">
              <label for="banner" class="form-label">Couverture</label>
              <input type="file" name="banner" id="banner" class="form-control-file">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-dark">Créer un Espace</button>
          </div>
    </form>

@endsection
