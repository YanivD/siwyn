@extends('layout')

@section('content')
    <div class="container">

        @foreach($posts as $post)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div>
                        <h3 style="font-size: 42px">{{ $post->title }}</h3>
                        <span style="font-size: 22px">{{ Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}</span>
                        <div class="pixel22">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .pixel22, .pixel22 * {
                    font-size: 22px !important;
                }
            </style>
        @endforeach

    </div>
@endsection