<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test solution</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('/css/welcom.css') }}" rel="stylesheet">
        <!-- Styles -->

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('add') }}">Ajouter un profil</a>
                        <a href="{{ route('home') }}">lister la fiche</a>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            $(document).ready(function () {

                $('.user').click(function () {

                });
            });
        </script>
    </body>
</html>
