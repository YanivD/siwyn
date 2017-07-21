@extends('layout')

@section('content')
    <div style="padding: 0 40px">
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-3 col-xs-6 text-center">
                    <a href="{{ route('posts_list') }}#post_{{ $image->post_id }}">
                        <img src="{{ asset($image['url']) }}" style=" max-width:100%;margin-bottom:30px;">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
