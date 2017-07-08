
<!doctype html>
<html dir="rtl">
    <head>
        <title>Say it with your nails</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/css/bootstrap-rtl.min.css">
        <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            button.btn-primary {
                background-color: #4da5b5 !important;
            }
            body {
                font-family: 'Assistant', sans-serif;
            }

            .navbar-nav .logo img {
                border-radius: 50%;
                height: 90px;
                width: 90px;
                margin-left: 15px;
            }

            .navbar-default {
                background: #f2dede;
            }

            .navbar-nav .logo {
                padding-top: 5px;
                font-size: 30px;
            }

            .navbar-nav {
                font-size: 24px;
            }

            .navbar {
                min-height: 100px;
            }

            .navbar .navbar-nav {
                height: 100px;
            }
            .navbar .navbar-nav li a {
                padding-top: 38px;
                height: 100px;
            }

            body {
                padding-top: 100px;
            }

            .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover {
                background-color: white;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <ul class="nav navbar-nav visible-xs" style="margin-bottom: 0">
                <li class="logo"><a href="/" style="padding: 0;color:#000"><img src="{{ asset('logo.png') }}" alt="Say it with you nails" />
                        <div style="padding-top:8px;float:left; width: calc(100% - 105px);line-height: 35px;">בלוג הציפורניים שלי<br>
                            <span style="font-size: 23px;color: #8a0146;font-weight: bold;">SAY IT WITH YOUR NAILS </div>
                    </a></li>
            </ul>

            <ul class="nav navbar-nav hidden-xs">
                <li class="logo"><a href="/" style="padding: 0;color:#000"><img src="{{ asset('logo.png') }}" alt="Say it with you nails" /> בלוג הציפורניים שלי </a></li>
            </ul>

            <ul class="nav navbar-nav navbar-left visible-xs" style="height:50px; margin-top:0; margin-bottom:0">
                <li style="width:20%;float:right;text-align: center" {!! \Request::route()->getName() == 'posts_list' ? 'class="active"' : '' !!}><a style="padding:10px;height:50px;" href="{{ route('posts_list') }}"><i class="glyphicon glyphicon-home"></i></a></li>
                <li style="width:20%;float:right;text-align: center" {!! \Request::route()->getName() == 'gallery' ? 'class="active"' : '' !!}><a style="padding:10px;height:50px;" href="{{ route('gallery') }}"><i class="fa fa-picture-o"></i></a></li>
                <li style="width:20%;float:right;text-align: center"><a style="padding:10px;height:50px;" href="#inputSubscribe"><i class="fa fa-envelope-o"></i></a></li>
                <li style="width:20%;float:right;text-align: center"><a style="padding:10px;height:50px;" href="https://www.instagram.com/sayitwithyournails/" target="_blank" style="font-size: 24px"><i class="fa fa-instagram"></i></a></li>
                <li style="width:20%;float:right;text-align: center"><a style="padding:10px;height:50px;" href="http://pin.it/ZWNffQD" target="_blank" style="font-size: 24px"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-left hidden-xs">
                <li {!! \Request::route()->getName() == 'posts_list' ? 'class="active"' : '' !!}><a href="{{ route('posts_list') }}">דף בית</a></li>
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
    <style>
        @media (max-width:794px) and (min-width:766px) {
            .navbar-nav .logo img {
                margin-left:7px !important;
            }
        }​
    </style>
    @yield('content')

    <div class="jumbotron">
        <div class="container" style="text-align: center">
            <h4 style="margin-top: 0; text-align: right">כתובת מייל לקבלת התראות</h4>
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true" style="
    left: auto;
    right: 0;"></span>
                <input type="email" class="form-control" id="inputSubscribe" aria-describedby="inputError2Status" style="
    padding-left: 12px;
    padding-right: 42.5px;">
            </div>
            <button type="button" id="addSubscribe" class="btn btn-primary" style="margin-top: 15px; padding-left: 25px; padding-right: 25px;">הרשמה</button>
        </div>

    </div>

    <script type="text/javascript">
        $('#addSubscribe').on('click', function (e) {
            $.ajax({
                type: 'get',
                url: '{{ route('add_subscriber') }}',
                data: {
                    email: $('#inputSubscribe').val()
                },
                success: function () {
                    $('#inputSubscribe').parent().addClass('has-success');
                    $('#inputSubscribe').siblings('.glyphicon')
                        .removeClass('glyphicon-envelope')
                        .addClass('glyphicon-ok');
                    $('#addSubscribe').html('נוספת בהצלחה לרשימה ');
                }
            })
        });



    </script>
</body>
</html>
