<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Post;
use App\Subscriber;

class SiteController extends Controller
{
    public function gallery()
    {
        $images = Gallery::where('is_show', true)->get();

        return view('site.gallery')
            ->with('images', $images);
    }

    public function homepage()
    {
        $visible_posts = Post::orderBy('published_at', 'desc')->get();

        return view('site.homepage')
            ->with('posts', $visible_posts);
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
