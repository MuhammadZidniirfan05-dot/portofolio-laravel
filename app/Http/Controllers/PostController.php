<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SocialLink;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $post->increment('views');

        $socialLinks = SocialLink::where('is_active', true)->orderBy('order')->get();

        $latestPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('posts.show', compact('post', 'socialLinks', 'latestPosts'));
    }
}
