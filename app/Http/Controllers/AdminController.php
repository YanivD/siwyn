<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Post;
use App\Subscriber;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard')
            ->with('images', Gallery::orderBy('id', 'desc')->get())
            ->with('posts', Post::orderBy('published_at', 'desc')->get());
    }

    public function edit_post($id) {
        $post = Post::findOrFail($id);
        return view('admin.edit_post')
            ->with('post', $post);
    }

    public function update_post($id) {
        Post::find($id)->update([
            'title'        => request()->get('title'),
            'published_at' => request()->get('published_at'),
            'is_published' => request()->get('is_published') ?: FALSE,
            'content'      => request()->get('content'),
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function update_gallery() {
        $activeImages = array_keys(request()->get('gallery'));

        Gallery::whereIn('url',    $activeImages)->update(['is_show'=> TRUE]);
        Gallery::whereNotIn('url', $activeImages)->update(['is_show'=> FALSE]);

        return redirect()->back();
    }

    public function add_post() {
        $post = Post::create([
            'title'        => 'פוסט חדש',
            'published_at' => date('Y-m-d'),
            'content'      => '',
            'is_published' => TRUE,
        ]);

        return redirect()->route('admin.edit_post', [ 'id' => $post->id ]);
    }

    public function delete_post($id) {
        Post::find($id)->delete();
        return redirect()->back();
    }

    public function upload_image() {
        $post_id = request()->get('post_id');
        $path = request()->file('image')->store('public/posts');
        $url = url('storage/'.$path);

        Gallery::create([
            'url'     => $url,
            'post_id' => $post_id,
            'is_show' => TRUE,
        ]);

        return $url;
    }
}
