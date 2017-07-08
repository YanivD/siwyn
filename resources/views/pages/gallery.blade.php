@extends('layout')

@section('content')
    <div style="padding: 0 40px">
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-3 col-xs-6 text-center">
                    <img src="{{ asset($image['url']) }}" style=" max-width:100%;margin-bottom:30px;">
                </div>
            @endforeach
        </div>
    </div>
@endsection
