@extends('layout')

@section('content')
    <div style="padding: 0 40px">
        <div class="row">
            @foreach($images as $image)
                <div class="col-md-3 col-xs-6 text-center galleryPost" style="margin-bottom:30px;">
                    <a href="{{ route('homepage') }}#{{ $image->post_id }}" style="display: inline-block;">
                        <img src="{{ asset($image['url']) }}" style="max-width:100%;">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .galleryPost {
            height: 260px;
        }

        .galleryPost img {
            max-height: 260px;
        }

        /* Only Extra Small Devices, Phones */
        @media screen and (max-width : 480px) {
            .galleryPost {
                height: 170px;
            }

            .galleryPost img {
                max-height: 170px;
            }
        }

    </style>
@endsection
