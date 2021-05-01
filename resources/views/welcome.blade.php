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

                        <!--affichage sur mobile utilisation de la class user et d'une class unique pour le contenu sur mobile-->
                            <div class="data1"><div class="users{{ $liste->id }}"><a href="#" class="users" data-id1="{{ $liste->id }}">{{ $liste->firstname }} {{ $liste->lastname }}</a></div>
                            <div id="users{{ $liste->id }}"></div></div>
                            <!--affichage sur mobile utilisation de la class user et d'une class unique pour le contenu sur mobile-->
                            <!--faire disparaite et afficher dynamiquement sur la partie mobile-->
                            <div class="data2"><div class="lists{{ $liste->id }}"><a href="#" class="lists" data-id2="{{ $liste->id }}">{{ $liste->firstname }} {{ $liste->lastname }}</a></div>
                            <div id="lists{{ $liste->id }}" ></div></div>


                    @endforeach

                </div>
                <div class="links1">
                    <!-- contenu Ajax of response dynamic tablette et ordinateur -->
                    <div id="content"></div>
              </div>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script>
            $(document).ready(function () {

                // ajax request for the case of the computer or the tablet
                // display data in the content div
                $(document).on('click', '.user', function(){

                    var id = $(this).data('id'); // on récupere l'id courant au click du profil d'une fiche
                    $.ajax({
                        url: "{{route('data')}}",// on traite par la fichier
                        type: "GET", // on envoi les donnees
                        data:{id:id},
                        success:function(data) { // on traite le fichier recherche apres le retour
                            $('#content').html(data);

                        },
                        error: function(){
                            alert('La requête n\'a pas abouti'); }
                    });

                });

                // affichage sur mobile afficher/cacher pour ergonomie click sur l'element
                $(document).on('click', '.users', function(){

                    var id = $(this).data('id1'); // on récupere l'id courant au click du profil d'une fiche
                    $.ajax({
                        url: "{{route('data')}}",  // on traite par la fichier
                        type: "GET",
                        data:{id:id},
                        success:function(data) { // on traite le fichier recherche après le retour
                            $('.users'+id).html(data); // on cache la div en cours ouverte.
                           // $('.lists'+id).css('display','block');// on affiche la div replacante avec le meme contenu
                           // $('#lists'+id).html(data);

                        },
                        error: function(){
                            alert('La requête n\'a pas abouti'); }
                    });

                });

            });
        </script>
    </body>
</html>
