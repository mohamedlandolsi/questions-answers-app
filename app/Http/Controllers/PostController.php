<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function createQuestion()
    {
        return view('question');
    }

    public function store()
    {
        $data = request()->validate([
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'type_id' => ['required', Rule::exists('types', 'id')]
        ]);

        $data['user_id'] = auth()->id();

        Post::create($data);

        return redirect('publications');
    }

    public function storeQuestion()
    {
        $attributes = request()->validate([
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'type_id' => ['required', Rule::exists('types', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('publications');
    }
}
