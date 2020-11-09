# Projet TechnoWeb

Développement d'un site de rencontre pour personnes sportives dans le cadre du module TechnoWeb de la L3 mention Informatique à la FST de LIMOGES.

Nous nous inspirons du sujet auquel nous souhaitons apporter quelques modifications - et ajouts - de fonctionnalités tant graphique que fonctionnelles.

### Prérequis

Serveur Web, Serveur PHP, Serveur MySQL pour la base de données.

Il faut le droit en écriture dans le dossier img/profils/ pour pouvoir modifier les photos de profils !

### Installation

1. Créer une base de données SQL et y importer les données du script présent dans SQL/DB.sql
2. Configurer la base et le fichier de configuration (include/pages/confid.inc.php) en adéquation pour garantir l'accès

### Arborescence

Les fichiers du projet sont trié selon l'arborescence suivante (fichiers PHP uniquement) :

* /classes/ : Fichiers PHP contenant les classes utilisées dans le projet. La plupart des classes correspondent à des tables de la base de données, ainsi que leur 'manager', l'interface avec la DB.
* /include/ : Parties incluses sur toutes les pages du site.
* /include/pages/ : Parties changeant à chaque page web.
* /index.php : Point d'entrée du site.


## Intégré avec

* [MariaDB](https://mariadb.org/) - Le SGBD utilisé (MySQL fait le même travaille)
* [PHP](https://www.php.net/manual/fr/index.php) - Langage de programmation coté serveur
* [JavaScript](https://developer.mozilla.org/fr/docs/Web/JavaScript) - Langage script des pages web
* [BootStrap](https://getbootstrap.com/) - Framework pour la mise en page

## Auteurs

* **Quentin DELAGE** - *Développement* - [QDelage](https://github.com/QDelage)
* **Paul PONT** (Profil anonymisé) - *Développement et base de donnée* - [PaulPont](https://github.com/PaulPont)

Ainsi que les aides des professeurs de la FST et de leurs cours.