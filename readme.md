# API pour TD TEMP

## Description :

Dans le cadre d'une évaluation lors de ma formation de dev Full stack, j'ai réalisé cette application qui permet de fournir juste l'API pour gérer les données de température et d'hygrométrie pour des officines (fictives). Cette API fournit toutes les informations de donneés ainsi que celles des utilisateurs.

## installation en local :

Ce projet est réalisé à partir de symfony.
Pour le récupérer, effecutez les commandes suivantes (dans votre console, en vous plaçant sur le dossier de travail dans lequel vous voulez importer le projet, et en prenant soin d'installer git sur votre machine)

- git init
- git clone git@github.com:leeroynico/api-projet-ecf.git

Listez et vérifiez que vous êtes bien placés sur la branche master

- git branch

Ensuite, installez toutes les dépendances nécessaires au bon fonctionnement de l'API :

- composer install

Pour les accés à la base de données, soit vous utilisez la base de données distante qui contient déjà des données (le projet est configuré de base come ceci), soit vous pouvez utiliser une bdd en local. Il faut alors commenter la ligne 27 du .env et décommenter la ligne 26 puis crééer la base de donnée avec

- php bin/console doctrine:database:create

puis éxécuter les migrations à l'aide de

- php bin/console doctrine:migrations:migrate

Ensuite alimenter la base de donnée en lançant les fixtures :

- symfony console doctrine:fixtures:load

Vous pouvez alors lancer le serveur symfony avec :

- symfony start

Losque votre navigateur ouvrira une nouvelle page en localhost, ajoutez /api à l'url pour accéder au gestionnaire de l'API => api platform.

on peut générer un token et ainsi vérifier le fonctionement de JWT en faisant une requête POST à l'adresse https://127.0.0.1:8000/api/login, en ajoutant dans le body en format JSON:
{
"username":"admin",
"password":"0000"
}.

Cette API donne les données qu'une autre application reprend et gère en front end (https://github.com/leeroynico/ECF-front).

## déploiement :

Vous pouvez utiliser heroku, après avoir créé un compte (https://signup.heroku.com), installé heroku sur votre machine :

- pour mac : brew tap heroku/brew && brew install heroku
- pour ubuntu : sudo snap install --classic heroku
- pour windows : https://devcenter.heroku.com/articles/heroku-cli#download-and-install

Vérifiez votre installation :

- heroku --version

Connectez votre compte :

- heroku login

Ensuite, le build de react sera fait par heroku :

- heroku create 'nom_du_site'
- git add .
- git commit -m "react-create-app on Heroku"
- git push heroku main
- heroku open

Enjoy ;)
