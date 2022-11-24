<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        //return Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6);
        return view('posts.index', [
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))
                ->paginate(3)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {

        return view('posts.create');
    }

    public function store()
    {
        $attr = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attr['user_id'] = auth()->id();

        Post::create($attr);

        return redirect('/');
    }
}
