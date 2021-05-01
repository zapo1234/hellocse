  Test dévéloppé pour société Hellocse
  installation et environnement de développement 
- Projet à récupérer sur la branch devTest
- cloner le projet avec git clone git@github.com:zapo1234/hellocse.git

- Utilisation du Back Lavarel 7 et Php 7.3

- Créer une base de données dans le fichier .env test_hellocse
- Recupérer les differentes migrations exixtantes dans le dossier migration et taper php artisan migrate
- Créer les deux table users et content.

- 2 tables users et content pour projet
  - taper php artisan serve ensuite
 - Page public  
- http://127.0.0.1:8000/index racine de l'application 

 - Auhtentification pour avoir accès au crud (créer,modifier , delete)

- Register  http://127.0.0.1:8000/register 
- créer un accès avec email et mot de passe 
- login connexion http://127.0.0.1:8000/login 
- Créer un accès au back office pour avoir la permission à l'action crud

- Une fois user connecté créer un ou plusieurs  profil pour les fiches  voir bouton en vert  
http://127.0.0.1:8000/star/add
