<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

    <div class="content">
        {{--Home Section--}}
        <div id="home">
            <div class="row">
                <div class="panel col-md-offset-6"  >
                    <div class="panel-body">
                        <img src="{{ asset('img/kabab.jpg') }}" style="height: 400px;width: 100% ">
                        <h3 class="text-center">Kabab</h3>
                        <blockquote class="blockquote-reverse">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type.
                            </p>
                            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                    </div>
                </div>

            </div>
            <div  class="row">
                <div class="col-md-3"></div>
                <div class="panel  col-md-6">
                    <div class="panel-body">
                        <img src="{{ asset('img/biriyani.jpg') }}" style="height: 300px;width: 100% ">
                        <h3 class="text-center">Biriyani</h3>
                        <blockquote class="blockquote-reverse">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type.
                            </p>
                            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div  class="row">
                <div class="panel col-md-6">
                    <div class="panel-body">
                        <img src="{{ asset('img/desert.jpg') }}" style="height: 300px;width: 100% ">
                        <h3 class="text-center">Desert</h3>
                        <blockquote class="blockquote-reverse">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type.
                            </p>
                            <small>Someone famous in <cite title="Source Title">Source Title</cite></small>
                        </blockquote>
                    </div>
                </div>
                <div class="col-md-6"></div>

            </div>
        </div>



        {{--End Of Home Section--}}

        {{--Blog Section--}}
        <div id="blog">
            <div  class="row">
                <div class="panel  col-md-4"  >

                    <div class="panel-body">
                        <img src="{{ asset('img/chef1.jpg') }}" style="height: 300px;width: 90% ">
                        <h3 class="text-center">Chef 1</h3>
                        <p>The following snippet of text is Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type
                            <strong><em>rendered as italicized text</em></strong>
                            .</p>


                    </div>
                </div>
                <div class="panel col-md-4"  >

                    <div class="panel-body">
                        <img src="{{ asset('img/chef2.jpg') }}" style="height: 300px;width: 90% ">
                        <h3 class="text-center">Chef 2</h3>
                        <p>The following snippet of text is Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type
                            <strong><em>rendered as italicized text</em></strong>
                            .</p>
                    </div>
                </div>
                <div class="panel  col-md-4"  >

                    <div class="panel-body">
                        <img src="{{ asset('img/chef3.jpg') }}" style="height: 300px;width: 90% ">
                        <h3 class="text-center">Chef 3</h3>
                        <p>The following snippet of text is Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type
                            <strong><em>rendered as italicized text</em></strong>
                            .</p>
                    </div>
                </div>
            </div>

        </div>
        {{--End Of Blog Section--}}
    </div>
</body>
</html>
