<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SpaceController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Publication;
use App\Models\Question;
use App\Models\Space;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $posts = Post::latest()->with('category', 'user');
    // $questions = Question::latest()->with('category', 'user');

    // if(request('search')) {
    //     $posts->where('body', 'like', '%' .request('search'). '%');
    //     $questions->where('body', 'like', '%' .request('search'). '%');
    // }

    // return view('posts', [
    //     'posts' => $posts->paginate(10)->withQueryString(),
    //     'questions' => $questions->paginate(10)->withQueryString()
    // ]);
    return view('home');
});

Route::get('questions', function() {
    $questions = Question::latest()->with('category', 'user');

    if(request('search')) {
        $questions->where('body', 'like', '%' .request('search'). '%');
    }

    return view('questions', [
        'questions' => $questions->paginate(10)->withQueryString()
    ]);
});

Route::get('publications', function() {
    // $posts = Post::latest()->with('category', 'user');
    $posts = Post::latest()->filter(request(['search', 'type']));
    $categories = Category::all();

    return view('posts', [
        'posts' => $posts->paginate(10)->withQueryString(),
        'categories' => $categories
    ]);
});


Route::get('posts/{post}', function($id) {
    $post = Post::findOrFail($id);

    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

Route::get('authors/{user:username}', function(User $user) {
    return view('posts', [
        'posts' => $user->posts->paginate(10)
    ]);
});

Route::get('/post/create', [PostController::class, 'create'])->middleware('auth');

Route::post('/publications', [PostController::class, 'store'])->middleware('auth');

Route::get('/question', [PostController::class, 'createQuestion'])->middleware('auth');

Route::post('/publications', [PostController::class, 'storeQuestion'])->middleware('auth');

Route::get('/stats', function() {
    // $posts = Post::latest()->with('category', 'user');
    $posts = Post::latest()->filter(request(['type']));

    return view('stats', ['posts' => $posts->paginate(10)->withQueryString()]);
})->middleware('auth');

// Espace
Route::get('/spaces', function() {
    return view('spaces');
});

Route::get('/my-spaces', function(User $user) {
    return view('mySpaces', [
        'spaces' => $user->spaces
    ]);
})->middleware('auth');

Route::get('/create/space', function() {
    return view('createSpace');
})->middleware('auth');

Route::post('/my-spaces', [SpaceController::class, 'store']);

Route::get('space/{space}', [SpaceController::class, 'index'])->name('show');

Route::get('space/{space}/edit', [SpaceController::class, 'edit'])->name('editSpace')->middleware('auth');

Route::patch('/space/{space}', [SpaceController::class, 'update'])->name('updateSpace');

// Auth
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
