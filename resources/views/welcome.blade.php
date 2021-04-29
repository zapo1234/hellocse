<!DOCTYPE html>
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
                background-color:#fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .top-right{
                margin-left:60%;
                margin-top:50px;
            }
            .compte{padding-left:3%;}

            .flex-center {

            }

            .position-ref {
                position: relative;
            }

            .top-right
            }

            .content {
            }

            .title {
              font-size:25px;
                margin-left: 30%;
                font-family: arial;
                text-decoration: underline;
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

            .link{
             margin-left: 10%;
            }
            .link,.links1{float: left;}
            .link a{
                display: block;
                font-family: arial;
                border:1px solid #eee;
                width: 200px;
                height: 40px;
                color:black;
                background: #eee;
                text-align: center;
                margin-top:3px;
                text-decoration: none;
                font-weight: bold;
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
                        <a href="{{ route('login') }}">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="compte">créer un compte</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Lister le contenu de vos  fiches clients..
                </div>

                <div class="link">

                    @foreach($listes as $liste)
                        <a href="" class="user" data-id="{{ $liste->id }}">{{ $liste->firstname }} {{ $liste->lastname }}</a>
                    @endforeach

                </div>
                <div class="links1">

              </div>

            </div>
        </div>
    </body>
</html>
