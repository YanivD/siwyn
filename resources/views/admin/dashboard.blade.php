@extends('layout')

@section('content')
    <div class="container" style="margin-bottom: 30px">
        <h2>ניהול פוסטים</h2>
        <a href="{{ route('admin.add_post') }}" class="btn btn-primary"><i class="fa fa-plus"></i> פוסט חדש</a>
        <table class="table table-hover table-bordered" style="margin-top: 20px">
            <thead>
            <tr>
                <th class="text-center">תאריך</th>
                <th class="text-center">כותרת</th>
                <th class="text-center">מוצג באתר?</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td style="min-width: 20%">{{ Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}</td>
                    <td>{{ $post->title }}</td>
                    <td class="text-center" style="font-size: 20px">@if($post->is_published) <i class="fa fa-thumbs-up" style="color: hotpink;"></i> @endif</td>
                    <td style="min-width:20%" class="text-center">
                        <a href="{{ route('admin.edit_post', ['id'=>$post->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> עריכה</a>
                        <a href="{{ route('admin.delete_post', ['id'=>$post->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('למחוק?');"><i class="fa fa-trash"></i> מחיקה</a>
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
        <form method="post" action="{{ route('admin.update_gallery') }}">
            <button type="submit" class="btn-primary btn-lg" id="updateGallery">שמירת שינויים בגלריה</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row" style="margin-top: 20px">
                @foreach($images as $image)
                    <div class="col-md-3 col-xs-6 text-center">
                        <label>
                            <input style="-webkit-transform: scale(2);margin-bottom: 7px;" type="checkbox" name="gallery[{{ $image['url'] }}]" {!! $image['is_show'] ? 'checked' : '' !!}><br />
                            <img src="{{ asset($image['url']) }}" style="max-width:100%;margin-bottom:30px;height: 200px">
                        </label>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
@endsection