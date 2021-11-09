# Blog project

## Les objectifs du projet : 
- Utiliser un framework PHP moderne (Symfony)
- Se former sur de nouvelles technologies (Docker, tailwindCSS, ...)
- Mettre en place un deploiement automatise


## Schema de la base de donnees

La BDD sera compose de 6 tables : 
- user 
- post
- post_comment
- post_meta
- post_category
- category

## Les fichiers

L'application en elle meme se trouve dans le dossier `apps/blog`. Le dossier `docker` contient la configuration *nginx* ainsi que la configuration *php*. L'application utilise la version 8.0 de mySQL et la version 7.4 de PHP. L'image nginx utilisee est la version 1.19.0-alpine