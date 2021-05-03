  Test dévéloppé pour société Hellocse
  installation et environnement de développement 
- Projet à récupérer sur la branch devTest
- cloner le projet avec git clone git@github.com:zapo1234/hellocse.
- Entrer composer install pour installer les dépendances  (dossier vendor) 
-  Branche à recupérer est la  branche devtest

- Serveur web utilisé wampserver port 80 , url localhost, base de données sur phpmyadmin (accès root , mot de passe vide) voir fichier .env
- Utilisation du Back Lavarel 7 et Php 7.3
- Utilisation du front Javascript/jquery Html/css et Ajax 

- Créer une base de données mysql dans le fichier .env  test_hellocse
- créer via phpmyadmin dans mysql votre base de données avec le meme nom  et pousser les migrations existante => php artisan migrate
- Recupérer les differentes migrations exixtantes dans le dossier migrations et taper php artisan migrate
- Créer les deux table users et content en poussant la commande cli php artisan migrate.

- 2 tables users et content pour projet
  - taper php artisan serve ensuite
 - Page public  
- http://127.0.0.1:8000/index racine de l'application page public responsive

 - Auhtentification pour avoir accès au crud (créer,modifier , delete)

- Register  http://127.0.0.1:8000/register 
- créer un accès avec email et mot de passe 
- login connexion http://127.0.0.1:8000/login 
- Créer un accès au back office pour avoir la permission à l'action crud
- Une fois user connecté créer un ou plusieurs  profil pour les fiches  voir bouton en vert  , edit ou suprimer.

- Différent dossiers
- le fichier web.php explicite pour les accès aux routes get et post utilisées pour le projet
- App/Http/controller les controllers utilisés (ProfilController.php  et AjaxController.php et des controller dans Auth pour l'autentification user)
- ressources/views pour les fichiers blade de la vue
- public (css/js/upload). un fichier welcom.css pour les média query vu sur mobile , tablette et ordinateur, le fichier welcome.blade.php public 
-  sur ce fichier se trouve le développement js/ajax pour afficher les divs en fonction du deskop(smarphone ,tablette et ordinateur)
- Utilisation de l'outils de développement du navigateur chrome pour visualiser la partie css responsive sur le mobible et sur les autres dimensions d'ecran
-  migrations pour les tables
-  .env pour la base de données mysql

- Respecter les validations sur les entrées Lastname( 1 contenu) et 
- firstname(1 contenu) pour donner forme à l'image du text(exemple Alexis Nominé ou Justine Tavares donc en 2 contenu de moins de 25)
- Valider le formulaire en respectant la validation sur les input.

Amélioration poussé en cas de projet prod
- Possibilité de mettre une relation ManyToOne entre users et la table content des profil de fiche (hasMany)
- renforcer des validation
- afficher les profils crée par user connecté
- Proposition de dev
