@extends('layout')

@section('content')
    <div class="container" style="margin-bottom: 30px">
        <h2>ניהול פוסטים</h2>
        <a href="{{ route('add_post') }}" class="btn btn-primary">פוסט חדש</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>תאריך</th>
                <th>כותרת</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->published_at }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('edit_post', ['id'=>$post->id]) }}" class="btn btn-xs btn-info">עריכה</a>
                        <a href="{{ route('delete_post', ['id'=>$post->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('למחוק?');">מחיקה</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <br>
        <br>
        <br>
        <br>
        <hr>

        <h2>ניהול גלריה</h2>

        <form method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-md-3 col-xs-6 text-center">
                        <label>
                            <input type="checkbox" name="gallery[{{ $image['url'] }}]" {!! $image['is_show'] ? 'checked' : '' !!}><br />
                            <img src="{{ asset($image['url']) }}" style="max-width:100%;margin-bottom:30px;height: 200px">
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn-block btn-primary" id="updateGallery">שמירת שינויים בגלריה</button>
        </form>
    </div>
@endsection