@extends('layout')

@section('content')
    <div style="padding: 0 40px">
        <div id="js-grid-lightbox-gallery" class="cbp">
            @foreach($images as $image)

            <div class="cbp-item web-design graphic print motion">
                <a href="{{ route('homepage') }}#{{ $image->post_id }}" class="cbp-caption cbp-sinגglePageInline">
                    <div class="cbp-caption-defaultWrap">
                        <img src="{{ asset($image['url']) }}" alt="">
                    </div>
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
