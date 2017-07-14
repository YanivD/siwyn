<?php

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

    return view('pages.posts_list')
        ->with('posts', \App\Post::orderBy('published_at', 'desc')->get());

})->name('posts_list');

Route::get('gallery', function () {

    return view('pages.gallery')
        ->with('images', \App\Gallery::where('is_show', true)->get());

})->name('gallery');




Route::get('add_subscriber', function () {
    $email = request()->get('email');
    \App\Subscriber::firstOrCreate([
        'email' => $email
    ]);
    return [];

})->name('add_subscriber');


Route::group(['middleware' => 'auth', 'prefix' => 'maya'], function () {

    Route::post('upload_image', function () {
        $path = request()->file('image')->store('public/posts');
        $url = url('storage/'.$path);

        \App\Gallery::create([
            'url' => $url,
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
        return view('pages.list_post')
            ->with('images', \App\Gallery::all())
            ->with('posts', \App\Post::orderBy('published_at', 'desc')->get());

    })->name('admin_posts_list');

    Route::get('add_post', function () {

        return view('pages.add_post');

    })->name('add_post');

    Route::get('delete_post/{id}', function ($id) {
        \App\Post::find($id)->delete();
        return redirect()->back();
    })->name('delete_post');

    Route::get('edit_post/{id}', function ($id) {
        $post = \App\Post::findOrFail($id);
        return view('pages.edit_post')
            ->with('post', $post);

    })->name('edit_post');

    Route::post('edit_post/{id}', function ($id) {

        \App\Post::find($id)->update(request()->all());

        return redirect()->route('admin_posts_list');
    });

    Route::post('add_post', function () {

        \App\Post::create(request()->all());

        return redirect()->route('admin_posts_list');
    });
});


// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
