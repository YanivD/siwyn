@extends('layout')

@section('content')
    <div class="container">

        @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3 style="font-size: 42px">{{ $post->title }}</h3>
                        <span style="font-size: 22px">{{ Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}</span>
                        <div style="font-size: 21px">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection