@extends('/layouts/app')

@section('title')

    Créer une Publication

@endsection

@section('banner')

    <h1>Publication: </h1><br>

@endsection

@section('content')
    <h3>Ajoutez une Publication</h3><br>

    <form action="/publications" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label">Description</label>
            <textarea class="form-control" id="body" rows="3" name="body" placeholder="Dites quelque chose..." required>{{ old('body') }}</textarea>
          </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Intérêt</label>
            <select name="category_id" id="category_id" class="form-select">
                @php
                    $categories = \App\Models\Category::all();                    
                @endphp

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Type</label>
            <select name="type_id" id="type_id" class="form-select" disabled>
                @php
                    $types = \App\Models\Type::all();
                @endphp

                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ ucwords($type->type) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-dark">Publier</button>
    </form>

@endsection
