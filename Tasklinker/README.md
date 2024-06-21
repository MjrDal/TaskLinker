# Getting Started

## Creation de l'espace de travail:

Il y a différentes manières d'installer Symfony mais l'approche la plus simple est de se baser sur Composer avec la commande create-project.

```bash
composer create-project symfony/skeleton:"7.0.*" TutoSymfony
```

Par défaut cette commande installe une version "vide" de Symfony dans laquelle on peut charger les modules que l'on souhaite utiliser. Pour ajouter tous les composants nécessaires à la création d'une application web on va se rendre dans le dossier du projet et utiliser la commande :

```bash
composer require webapp
```

## Lancement de l'application:

```bash
php -S localhost:8000 -t public
```

## Creation d'un controleur:

```bash
php bin/console make:controller "name"
```

Cela creer deux fichiers:
-.php
-.twig

## communication avec base de donnée:
