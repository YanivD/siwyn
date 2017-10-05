@extends('layout')

@section('content')
    <div class="container">

        <a href="{{ route('gallery') }}" class="col-xs-12 col-sm-4" style="float: left;display: block">
            <div class="row">
                @foreach($gallery_latest as $image)
                    <div class="col-sm-6 col-xs-4" style="padding: 2px">
                        <div style="width: 100%;max-height:180px;min-height:150px;background: url({{ $image->url }}) center center;background-size: cover"></div>
                    </div>
                @endforeach
            </div>
        </a>

        @foreach($posts as $i => $post)
            <div class="panel panel-default @if($i == 0) col-sm-8 @endif col-xs-12" style="float: right">
                <div class="panel-body">
                    <div>
                        <h3 style="font-size: 42px" id="post_{{ $post->id }}">{{ $post->title }}</h3>
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