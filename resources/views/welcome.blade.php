<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}" />
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
                        <!-- affichage sur ordinateur ou tablette utilisation de la class user-->
                        <div><a href="#" class="user" data-id="{{ $liste->id }}">{{ $liste->firstname }} {{ $liste->lastname }}</a></div>

                        <!--affichage sur mobile utilisation de la class user et d'une class unique pour le contenu-->
                            <div class="users"><a href="#" class="users" data-id="{{ $liste->id }}">{{ $liste->firstname }} {{ $liste->lastname }}</a></div>
                            <div class="users{{ $liste->id }}" id="users"></div>
                    @endforeach

                </div>
                <div class="links1">
                    <h1>Profile Browser</h1>
                    <!-- contenu Ajax of response dynamic tablette et ordinateur -->
                    <div id="content"></div>
              </div>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            jQuery(document).ready(function () {

                jQuery('.user').click(function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                    var id =$(this).data('id'); // on récupere l'id courant au click du profil d'une fiche
                    $.ajax({
                        type:'POST', // on envoi les donnes
                        method: 'post',
                        url:"{{ url('/star/data') }}",// on traite par la fichier
                        data:{id:id},
                        success:function(data) { // on traite le fichier recherche apres le retour
                            $('#content').html(data);

                        }
                    });

                });
            });
        </script>
    </body>
</html>
