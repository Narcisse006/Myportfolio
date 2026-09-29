# Portfolio de Narcisse OGOUDIKPE

Portfolio personnel construit avec Laravel et un design responsive.

## Présentation

Ce dépôt contient le portfolio de Narcisse OGOUDIKPE, développeur Laravel junior.
Il présente :

- une page de présentation professionnelle,
- une section d'expertise,
- une biographie et parcours,
- un affichage de compétences techniques,
- des projets sélectionnés,
- un formulaire de contact fonctionnel,
- un commutateur de langue Français / Anglais.

## Structure du projet

- `routes/web.php` : routes principales du portfolio.
- `resources/views/index.blade.php` : page principale du portfolio.
- `resources/views/cv.blade.php` : page CV dédiée.
- `resources/views/partials/custom-cursor.blade.php` : curseur personnalisé.
- `resources/views/partials/preloader.blade.php` : préloader présent dans le code mais retiré du rendu initial.
- `public/js/main.js` : logique de navigation, traduction et interactions.
- `public/js/dev-preloader.js` : script du préloader, non inclus dans la page d'accueil.
- `public/css/style.css` : styles et animations du site.

## Installation

1. Cloner le dépôt :

```bash
git clone <repository-url>
cd Myportfolio
```

2. Installer les dépendances PHP :

```bash
composer install
```

3. Copier le fichier d'environnement et générer la clé :

```bash
cp .env.example .env
php artisan key:generate
```

4. Lancer le serveur de développement :

```bash
php artisan serve
```

Le site est accessible sur `http://127.0.0.1:8000`.

## Fonctionnalités

- navigation one-page avec ancres et défilement fluide,
- menu de navigation responsive,
- bascule de langue FR/EN côté client,
- formulaire de contact avec validation backend,
- page CV dédiée accessible via `/cv`.

## Espace admin

L’administration Filament est disponible sur `/admin`.

1. Créer la base MySQL `portfolio_narcisse` et renseigner `DB_*`, `ADMIN_EMAIL` et `ADMIN_PASSWORD` dans `.env`.
2. Lancer les migrations et le compte admin :

```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

Les projets publiés de la page d’accueil viennent de la table `projects`. Les messages du formulaire sont enregistrés dans `contacts`, en plus de l’email.

## Routes principales

- `/` : page portfolio principale.
- `/admin` : espace d’administration.
- `/cv` : page CV.
- `/contact` : route POST pour soumettre le formulaire de contact.

## Préloader

La page principale ne charge plus le préloader d'entrée. Le fichier `resources/views/partials/preloader.blade.php` est toujours présent dans le projet mais n'est plus rendu dans `index.blade.php` ni `cv.blade.php`.

## Déploiement

- Vérifier que `APP_ENV=production` et `APP_DEBUG=false`.
- Exécuter :

```bash
php artisan config:cache
php artisan route:cache
```

- Déployer sur un serveur PHP compatible ou via Docker/Render selon vos besoins.

## Licence

MIT.
