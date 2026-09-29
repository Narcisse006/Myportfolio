# Développement

## Environnement local

PHP 8.4. `composer.json` exige `^8.4` et fixe la plateforme Composer sur `8.4.1`. Un `composer update` sur une autre version de PHP ne doit pas changer cette contrainte sans mettre à jour le `Dockerfile` en même temps.

Copier `.env.example` vers `.env`. Les valeurs utiles :

| Variable | Rôle |
|----------|------|
| `APP_KEY` | Clé Laravel. `php artisan key:generate` |
| `APP_URL` | URL utilisée pour les liens absolus et les images `/storage` |
| `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` | MySQL local. Base prévue : `portfolio_narcisse` |
| `ADMIN_NAME`, `ADMIN_EMAIL`, `ADMIN_PASSWORD` | Compte créé ou mis à jour par le seeder |
| `MAIL_MAILER`, `RESEND_KEY`, `MAIL_FROM_ADDRESS`, `MAIL_FROM_NAME` | Envoi Resend |
| `MAIL_TO_ADDRESS` | Boîte qui reçoit les messages du formulaire |

`ADMIN_PASSWORD` reste vide dans `.env.example`. Le remplir en local, ne jamais committer `.env`.

Commandes de mise en route :

```bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
```

`storage:link` crée `public/storage` vers `storage/app/public`. Sans ce lien, les images de projets uploadées dans l’admin ne s’affichent pas sur le site.

Le site public n’a pas besoin de `npm run dev`. Cette commande lance Vite pour la page d’exemple `welcome`, qui n’est pas routée.

## Tests

```bash
php artisan test
```

`tests/TestCase.php` réinitialise la base à chaque test (`RefreshDatabase`). La base de test est SQLite en mémoire, définie dans `phpunit.xml`. Elle n’utilise pas MySQL.

Tests utiles :

- `tests/Feature/ContactFormTest.php` : envoi, validation, piège anti-robot, limite de 5 requêtes.
- `tests/Feature/ProjectListingTest.php` : ordre des projets publiés, page de login, tableau de bord, mise à jour du profil.
- `tests/Feature/ExampleTest.php` et `tests/Unit/ExampleTest.php` : exemples livrés avec Laravel.

## Migrations et seeders

Nouvelle table ou colonne : `php artisan make:migration`, puis `php artisan migrate`.

Les seeders sont idempotents :

- l’admin est un `updateOrCreate` sur l’e-mail ;
- les projets de démo sont un `firstOrCreate` sur le titre.

`php artisan db:seed` rappelle les deux. Sur Render, `docker/start.sh` les rappelle à chaque démarrage.

## Git

Le déploiement Render suit la branche `main` (`render.yaml`). Les changements passent par une branche et une pull request, puis un merge dans `main`.

Ne pas committer `.env`.

Le dépôt distant est `https://github.com/Narcisse006/Myportfolio.git`.

## Conventions visibles dans le code

- L’admin parle français : libellés Filament, messages du formulaire, notifications.
- Le site public est français dans le HTML, anglais dans `public/js/main.js`.
- Le contrôleur du site s’appelle `indexController` (i minuscule), fichier `app/Http/Controllers/indexController.php`.
- Pas de couche service. Une règle métier du contact reste dans `indexController` et `ContactRequest`. Une règle d’un écran admin reste dans la ressource Filament ou le modèle.
- Les modèles déclarent `$fillable`. On n’assigne pas des colonnes hors de cette liste.
- Le mot de passe passe par le cast `hashed` de `User`. Les seeders et le profil admin fournissent le mot de passe en clair.
- Les vues Filament ajoutées par le projet sont dans `resources/views/filament/`.
- Les assets du site public sont dans `public/css` et `public/js`, pas dans le build Vite.

## Erreurs et validation

Le formulaire de contact n’affiche pas une page 422. `ContactRequest::failedValidation` redirige vers l’accueil, ancre `contact-section`, avec les erreurs et les anciennes saisies.

Les échecs d’e-mail sont journalisés avec `report()`. Le visiteur voit un message français. Le détail de l’exception n’est ajouté que si le mode debug est actif.

La limite de débit est une exception Laravel rendue dans `bootstrap/app.php`, uniquement pour la route `contact.store`.

## Déploiement

Le guide pas à pas est `DEPLOY-RENDER.md`.

En bref, le conteneur :

1. est construit par le `Dockerfile` (`php:8.4-cli`, extensions `intl`, `pdo_sqlite`, `zip`) ;
2. démarre avec `docker/start.sh` ;
3. met la config en cache, crée le fichier SQLite si besoin, migre, seed, met les routes et les vues en cache ;
4. lance `php artisan serve` sur le port `PORT` (10000 dans l’image, fourni par Render au runtime).

Le processus tourne sous l’utilisateur `www-data`. Les dossiers `storage`, `bootstrap/cache` et `database` doivent lui appartenir. C’est fait dans le `Dockerfile`.

`GET /up` sert de healthcheck.

`.github/workflows/keep-alive.yml` interroge toutes les 10 minutes `https://narcisseogoudikpe.onrender.com/up`, `/robots.txt` et `/`. Le but est d’éviter l’endormissement du plan gratuit.

Fichiers publics liés au référencement : `public/robots.txt`, `public/sitemap.xml`, et le partial SEO.
