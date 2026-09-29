# Portfolio de Narcisse OGOUDIKPE

Site personnel d’un Full-Stack Developer, avec une page publique et un espace d’administration.

Le site public présente le parcours, les compétences et les projets publiés, et reçoit les messages de contact. L’administration sert à modifier ces projets, lire les messages et mettre à jour le compte admin.

## Stack

- PHP 8.4, Laravel 12
- Admin : Filament 3.3, sur `/admin`
- Site public : Blade, Bootstrap 4.3.1, jQuery (fichiers dans `public/`)
- Base locale : MySQL. En production (Render) : SQLite dans le conteneur
- E-mails : Resend
- Tests : PHPUnit

Le CSS Tailwind et Vite présents dans le dépôt ne servent pas la page publique. Ils ne sont chargés que par `resources/views/welcome.blade.php`, qui n’a pas de route.

## Prérequis

- PHP 8.4
- Composer
- MySQL 8, base `portfolio_narcisse`
- Node n’est pas nécessaire pour lancer le site public

## Installation

```bash
git clone https://github.com/Narcisse006/Myportfolio.git
cd Myportfolio
composer install
cp .env.example .env
php artisan key:generate
```

Renseigner dans `.env` : `DB_*`, `ADMIN_EMAIL`, `ADMIN_PASSWORD`, et les variables `MAIL_*` si le formulaire doit envoyer un e-mail.

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
php artisan serve
```

- Site : http://127.0.0.1:8000
- Admin : http://127.0.0.1:8000/admin

## Commandes utiles

```bash
php artisan test
php artisan migrate
php artisan db:seed
php artisan storage:link
```

## Documentation

| Fichier | Rôle |
|---------|------|
| [docs/architecture.md](docs/architecture.md) | Dossiers, couches, flux |
| [docs/features.md](docs/features.md) | Fonctionnalités et fichiers à ouvrir |
| [docs/database.md](docs/database.md) | Tables et modèles |
| [docs/authentication.md](docs/authentication.md) | Connexion admin |
| [docs/components.md](docs/components.md) | Morceaux réutilisables |
| [docs/development.md](docs/development.md) | Install, tests, Git, déploiement |
| [docs/decisions.md](docs/decisions.md) | Choix techniques |
| [docs/changelog.md](docs/changelog.md) | Évolutions importantes |
| [DEPLOY-RENDER.md](DEPLOY-RENDER.md) | Mise en ligne Render, pas à pas |

Le déploiement automatique est décrit dans `render.yaml` et `docker/start.sh`. Render reconstruit la branche `main`.
