<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->ofType('blog')->latest()->paginate(9);
        return view('posts.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->published()->firstOrFail();
        $post->increment('view_count');

        $relatedPosts = Post::published()
            ->ofType($post->type)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
