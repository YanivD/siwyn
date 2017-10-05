<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Post;
use App\Subscriber;

class SiteController extends Controller
{
    public function gallery()
    {
        $published_posts = Post::where('is_published', TRUE)->get();
        $images = Gallery::where('is_show', true)
            ->whereIn('post_id', array_column($published_posts->toArray(), 'id'))
            ->orderBy('id', 'desc')
            ->get();

        return view('site.gallery')
            ->with('images', $images);
    }

    public function homepage()
    {
        $visible_posts = Post::where('is_published', TRUE)
            ->orderBy('published_at', 'desc')->get();

        $gallery_latest = Gallery::where('is_show', TRUE)->orderBy('id', 'desc')->take(6)->get();

        return view('site.homepage')
            ->with('posts', $visible_posts)
            ->with('gallery_latest', $gallery_latest);
    }

    public function add_subscriber()
    {
        $email = request()->get('email');
        Subscriber::firstOrCreate([
            'email' => $email
        ]);
        return [];
    }
}
