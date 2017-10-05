<?php

Route::get('/',       'SiteController@homepage')->name('homepage');
Route::get('gallery', 'SiteController@gallery') ->name('gallery');
Route::get('gallery', 'SiteController@gallery') ->name('gallery');
Route::get('add_subscriber', 'SiteController@add_subscriber')->name('add_subscriber');





Route::group(['middleware' => 'auth', 'prefix' => 'maya'], function () {

    Route::post('upload_image', function () {
        $post_id = request()->get('post_id');
        $path = request()->file('image')->store('public/posts');
        $url = url('storage/'.$path);

        \App\Gallery::create([
            'url' => $url,
            'post_id' => $post_id,
            'is_show' => TRUE,
        ]);

        return $url;
    })->name('upload_image');

    Route::post('/', function () {
        $activeImages = array_keys(request()->get('gallery'));

        \App\Gallery::whereIn('url', $activeImages)->update(['is_show'=> TRUE]);
        \App\Gallery::whereNotIn('url', $activeImages)->update(['is_show'=> FALSE]);
        return redirect()->back();
    });

    Route::get('/', function () {
        return view('admin.list_post')
            ->with('images', \App\Gallery::all())
            ->with('posts', \App\Post::orderBy('published_at', 'desc')->get());

    })->name('admin_posts_list');

    Route::get('add_post', function () {

        return view('admin.add_post');

    })->name('add_post');

    Route::get('delete_post/{id}', function ($id) {
        \App\Post::find($id)->delete();
        return redirect()->back();
    })->name('delete_post');

    Route::get('edit_post/{id}', function ($id) {
        $post = \App\Post::findOrFail($id);
        return view('admin.edit_post')
            ->with('post', $post);

    })->name('edit_post');

    Route::post('edit_post/{id}', function ($id) {

        \App\Post::find($id)->update(request()->all());

        return redirect()->route('admin_posts_list');
    });

    Route::post('add_post', function () {

        $post = \App\Post::create(request()->all());
        \App\Gallery::where('post_id', NULL)->update(['post_id' => $post->id ]);

        return redirect()->route('admin_posts_list');
    });
});


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
