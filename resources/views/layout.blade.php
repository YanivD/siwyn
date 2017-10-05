<!doctype html>
<html dir="rtl">
    <head>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107565467-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-107565467-1');
        </script>
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
        <meta name="theme-color" content="#ff69b4">
        <title>Say it with your nails</title>
        <meta charset="utf-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/css/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
        <link href="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            @media (max-width:794px) and (min-width:766px) {
                .navbar-nav .logo img {
                    margin-left:7px !important;
                }
            }​
        </style>
    </head>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <ul class="nav navbar-nav visible-xs" style="margin-bottom: 0">
                <li class="logo">
                    <a href="/" style="padding: 0;color:#000">
                        <img src="{{ asset('logo.png') }}" alt="Say it with you nails" />
                        <div style="padding-top:8px;float:left; width: calc(100% - 105px);line-height: 35px;">בלוג הציפורניים שלי<br>
                            <span style="font-size: 23px;color: #8a0146;font-weight: bold;">SAY IT WITH YOUR NAILS</span>
                        </div>
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav hidden-xs">
                <li class="logo">
                    <a href="/" style="padding: 0;color:#000">
                        <img src="{{ asset('logo.png') }}" alt="Say it with you nails" />
                        בלוג הציפורניים שלי
                    </a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-left visible-xs" style="height:50px; margin-top:0; margin-bottom:0">
                <li style="width:20%;float:right;text-align: center" {!! \Request::route()->getName() == 'homepage' ? 'class="active"' : '' !!}><a style="padding:10px;height:50px;" href="{{ route('homepage') }}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li style="width:20%;float:right;text-align: center" {!! \Request::route()->getName() == 'gallery' ? 'class="active"' : '' !!}><a style="padding:10px;height:50px;" href="{{ route('gallery') }}"><i class="fa fa-picture-o"></i></a></li>
                <li style="width:20%;float:right;text-align: center"><a style="padding:10px;height:50px;" href="#inputSubscribe"><i class="fa fa-envelope-o"></i></a></li>
                <li style="width:20%;float:right;text-align: center"><a style="padding:10px;height:50px;" href="https://www.instagram.com/sayitwithyournails/" target="_blank" style="font-size: 24px"><i class="fa fa-instagram"></i></a></li>
                <li style="width:20%;float:right;text-align: center"><a style="padding:10px;height:50px;" href="http://pin.it/ZWNffQD" target="_blank" style="font-size: 24px"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-left hidden-xs">
                <li {!! \Request::route()->getName() == 'homepage' ? 'class="active"' : '' !!}><a href="{{ route('homepage') }}">דף בית</a></li>
                <li {!! \Request::route()->getName() == 'gallery' ? 'class="active"' : '' !!}><a href="{{ route('gallery') }}">גלריה</a></li>
                <li><a href="#inputSubscribe">הרשמה</a></li>
                <li><a href="https://www.instagram.com/sayitwithyournails/" target="_blank" style="font-size: 24px"><i class="fa fa-instagram"></i></a></li>
                <li><a href="http://pin.it/ZWNffQD" target="_blank" style="font-size: 24px"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron visible-md visible-lg" style="background: #8a0146;">
        <div class="container">
            <h1 style="text-align: center;font-weight: bold; color: #fff;">SAY IT WITH YOUR NAILS</h1>
        </div>
    </div>
    <div class="jumbotron visible-sm" style="z-index:999999;background: #8a0146;position: fixed; width: 100%">
        <div class="container">
            <h1 style="text-align: center;font-weight: bold; color: #fff;">SAY IT WITH YOUR NAILS</h1>
        </div>
    </div>
    <div class="jumbotron visible-xs" style="height:68px;margin:0;padding:0;background: transparent">
    </div>
    <div class="jumbotron visible-sm" style="height:220px;margin:0;padding:0;background: transparent">
    </div>
    @yield('content')

    @if(in_array(\Request::route()->getName(), ['homepage', 'gallery'])):
        <div class="jumbotron">
            <div class="container" style="text-align: center">
                <h4 style="margin-top: 0; text-align: right">כתובת מייל לקבלת התראות</h4>
                <div class="form-group has-feedback">
                    <i class="fa fa-envelope form-control-feedback" style="right: 0;left: auto;"></i>
                    <input type="email" class="form-control" id="inputSubscribe" aria-describedby="inputError2Status" style="
        padding-left: 12px;
        padding-right: 42.5px;">
                </div>
                <button type="button" id="addSubscribe" class="btn btn-primary" style="margin-top: 15px; padding-left: 25px; padding-right: 25px;">הרשמה</button>
            </div>
        </div>
    @endif


    <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
    <script type="text/javascript">
        var SITE_VARS = {
            currentRoute: '{{ \Request::route()->getName() }}',
            addSubscriberUrl: '{{ route('add_subscriber') }}'
        };

        $(document).ready(function() {
            SITE.global();

            if (SITE[SITE_VARS.currentRoute]) {
                SITE[SITE_VARS.currentRoute]();
            }
        });
    </script>
</body>
</html>
