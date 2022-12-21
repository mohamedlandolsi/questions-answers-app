<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Space;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SpaceController extends Controller
{
    public function index($space)
    {
        $space = Space::findOrFail($space);
        $posts = Post::latest()->filter(request(['search', 'type']));

        return view('space', [
            'space' => $space,
            'posts' => $posts->paginate(10)->withQueryString()
        ]);
        
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => '',
            'icon' => 'image',
            'banner' => 'image'
        ]);

        $data['user_id'] = auth()->id();
        $data['icon'] = request('icon')->store('uploads', 'public');
        $data['banner'] = request('banner')->store('uploads', 'public');

        // ERROR: GD Library extension not available with this PHP installation.
        // $icon = Image::make(public_path("storage/{$data['icon']}"))->fit(120, 120);
        // $icon->save();
        // $banner = Image::make(public_path("storage/{$data['banner']}"))->fit(1100, 207);
        // $banner->save();

        Space::create($data);

        return redirect('my-spaces');
    }

    public function edit(Space $space)
    {
        // $this->authorize('update', $space->space);
        return view('editSpace', compact('space'));
    }

    public function update(Space $space)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'icon' => '',
            'banner' => ''
        ]);

        if(request('icon')) {
            $data['icon'] = request('icon')->store('uploads', 'public');
        }

        $data = $space->update(array_merge(
            $data,
            ['icon' => $data['icon']]
        ));
        
        return redirect('/space/{ $space->id }');
    }
}
