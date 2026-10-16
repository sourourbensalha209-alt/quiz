# Quiz

Application web de quiz en PHP / MySQL : création de quiz par catégories, passage des quiz,
inscription et connexion, back-office d'administration.

## Prérequis

- PHP 8.x avec les extensions `mysqli`, `mbstring`, `gd`, `curl`
- MySQL ou MariaDB
- Apache avec `mod_rewrite` (le fichier `.htaccess` gère les URLs propres)

Le plus simple : [XAMPP](https://www.apachefriends.org/) (Apache + PHP + MariaDB).

## Installation

1. Copier le projet dans `htdocs/quiz/` (XAMPP) puis démarrer **Apache** et **MySQL**.
2. Dans phpMyAdmin, créer une base nommée `quizzes`, puis importer `quizzes.sql`.
3. Vérifier la connexion à la base dans `configs/connection.php`
   (par défaut : `localhost`, `root`, mot de passe vide, base `quizzes`).
4. Ouvrir <http://localhost/quiz/>.

Le dossier `vendor/` est déjà inclus : pas besoin de `composer install`.

## Comptes de démonstration

| Rôle  | Identifiant | Mot de passe |
|-------|-------------|--------------|
| Admin | `test`      | `test`       |
| Utilisateur | `demo3`, `demo4`, `demo5` | `test` |

Le back-office est accessible sur `/dashboard.php` avec le compte admin.

> **À changer avant toute mise en ligne** : ces comptes et mots de passe sont publics.
> Mettre aussi `display_errors` sur `Off` dans `configs.php`.

## Configuration optionnelle

PayPal, la connexion Facebook / Google / Twitter et l'envoi d'emails (SMTP) se configurent
dans le back-office, section *Settings*. Le site fonctionne sans.

## Limites connues

- Les fichiers `plans.php`, `statistics.php` et `cpanel/plans.php` sont référencés
  (`.htaccess`, `dashboard.php`) mais absents du dépôt : les pages correspondantes
  renvoient une erreur 404 ou un avertissement PHP.
- Avertissement PHP mineur dans `cpanel/categories.php` (ligne 83), sans effet sur le fonctionnement.
