# GESTION-MATERIEL-IUT
[Symfony] Back-office et API de gestion d'emprunts de matériel de l'IUT

## CONTEXTE

Le but est de gérer le prêt du matériel de l'IUT directement sur une application Web et/ou mobile.

Les produits disponibles devront être catégorisés par type (photos/vidéos/informatique/...) et par groupe (mmi/chimie/info/enseignant/...).

## FONCTIONNALITES

* Le back office :

Dans le back office, il est possible d'effectuer toutes les actions CRUD de chaque entité.

La connexion est implémentée grâce au Bundle Security de symfony.

![capture d'écran côté front](https://github.com/luvelut/GESTION-MATERIEL-IUT/blob/main/backoffice.JPG) 

* L'API REST :

L'API a été conçue grâce au module Api Platform. Toutes les actions CRUD des entités sont disponibles.

La documentation est disponible ici : http://127.0.0.1:8000/api ( après avoir installer localement le projet )

L'authentification de l'API a été réalisée grâce au bundle LexikJWTAuthentication (https://github.com/lexik/LexikJWTAuthenticationBundle) qui fonctionne grâce à un token d'authentification que l'on peut obtenir grâce à la requête suivante :
```curl -X 'POST' \
  'http://127.0.0.1:8000/api/login' \
  -H 'accept: application/json' \
  -H 'Content-Type: application/json' \
  -d '{
  "username": "lucilevelut@orange.fr",
  "password": "test"
  }'
```

## INSTALLATION EN LOCAL

Pour installer le projet en local sur votre machine, veuillez suivre les différentes étapes : 

### 1. Cloner le repository

### 2. Configurer le [.env](./.env)

Pour cela, renseignez les informations de la base de données (DATA_URL)

⚠️ Vous devez avoir au préalable créer votre base de données, vous pouvez directement l'importer grâce au fichier .sql contenu dans le dépôt.

### 3. Installer les dependances php : `composer i`

### 4. Installer les dépendances js : `yarn` **ou** `npm i`

### 5. Lancer le serveur *Symfony* : `symfony serve`
