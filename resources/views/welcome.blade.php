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
                        <a  class ="nav" href="{{ route('login') }}">Connexion</a>

                        @if (Route::has('register'))
                            <a class="nav" href="{{ route('register') }}" class="compte">créer un compte</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Lister le contenu de vos  fiches clients.
                </div>

                <div class="link">

                    @foreach($listes as $liste)
                        <!-- affichage sur ordinateur ou tablette utilisation de la class user-->
                            <!-- un display none sur  mobile user dans le css-->
                            <div class="list"><a href="#" class="user" data-id="{{ $liste->id }}">{{ $liste->firstname }} {{ $liste->lastname }}</a></div>

                        <!--affichage sur mobile utilisation de la class users et d'une class unique pour le contenu sur mobile-->
                            <!-- un display none sur ces class tablette ,oridnateur dans le css -->
                            <div class="data1"><a href="#"  class="users" data-id1="{{ $liste->id }}">{{ $liste->firstname }} {{ $liste->lastname }}</a></div>
                           
                            <div id="list{{ $liste->id }}" class="listas" css="display:none"></div>
                            <!--affichage sur mobile utilisation de la class list  et d'une class unique pour le contenu sur mobile-->
                            
                            


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

                // ajax request for the case of the computer or the tablette
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

                // affichage sur mobile,smarphone afficher/cacher pour ergonomie click sur l'element
                // cacher/afficher les élements par click pour plus d'ergonomie
                $(document).on('click', '.users', function(){

                    var id = $(this).data('id1'); // on récupere l'id courant au click du profil d'une fiche
                    var text = $('#list'+id).text();

                    if(text !=""){    // si la div ne contient aucun caractère
                    $('#list'+id).html('');// on vide la div au cas ou elle posséde deja les élements 
                      }
                    else{
                    $.ajax({
                        url: "{{route('data')}}",  // on traite par la fichier
                        type: "GET",
                        data:{id:id},
                        success:function(data) { // on traite le fichier recherche après le retou
                           $('#list'+id).html(data);// afficher le contenu dans la div 
                            
                         },
                        error: function(){
                            alert('La requête n\'a pas abouti'); }
                    });
                  }
                });

   });
        </script>
    </body>
</html>
