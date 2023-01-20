# MongoApi

Lucas Cordurié
Julien Sacquard
Tristan Belmont
Damien Welfringer
Lucas Farroni
Enes Karakaya

## Installation

- Cloner le repo
- Ouvrir le dossier du projet dans un terminal et lancer la commande `docker compose up -d`
- Si le conteneur mongo-express n'est pas démarré, lancer la commande `docker compose start mongo-express` (le faire par précaution)
- Executer la commande `docker exec -it mongoapi-php-1 bash -c "cd ../html && composer install"` pour installer les dépendances
- Ouvrir un navigateur et se rendre à l'adresse `http://localhost:12080/` pour voir l'app
- Ouvrir un navigateur et se rendre à l'adresse `http://localhost:8081/` pour voir la base de données
