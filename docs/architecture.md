# Architecture

Deux applications vivent dans le même projet Laravel.

1. Le **site public** : pages Blade servies par `indexController`, habillées par les fichiers de `public/css` et `public/js`.
2. L’**administration** : un panneau Filament monté sur `/admin`. Filament génère ses propres pages (formulaires, tableaux) à partir des classes de `app/Filament`. Il ne réutilise pas le HTML du site public.

Il n’y a pas de couche « service ». Le contrôleur public et les ressources Filament parlent directement aux modèles Eloquent et, pour le contact, à la classe Mail.

## Dossiers qui comptent

| Dossier ou fichier | Rôle |
|--------------------|------|
| `routes/web.php` | Les 3 routes du site public |
| `app/Http/Controllers/indexController.php` | Accueil, CV, envoi du formulaire |
| `app/Http/Requests/ContactRequest.php` | Règles de validation du formulaire |
| `app/Models/` | `Project`, `Contact`, `User` |
| `app/Mail/ContactMail.php` | E-mail envoyé après un message |
| `app/Filament/` | Écrans d’administration |
| `app/Providers/Filament/AdminPanelProvider.php` | Réglage du panneau `/admin` |
| `app/Providers/AppServiceProvider.php` | HTTPS forcé en production, date de dernière connexion |
| `config/portfolio.php` | Liens publics : GitHub, e-mail, téléphone, WhatsApp |
| `config/mail.php` | Destinataire du formulaire : `mail.contact.address` |
| `resources/views/` | HTML du site, de l’e-mail et de quelques bouts d’admin |
| `public/css/style.css` | Feuille de style réelle du site public |
| `public/js/main.js` | Menu, animations, traduction FR/EN |
| `database/migrations/` | Structure des tables |
| `database/seeders/` | Compte admin et 4 projets de départ |
| `docker/start.sh` | Ce que le conteneur exécute à chaque démarrage Render |
| `tests/Feature/` | Tests du formulaire, des projets et de l’admin |

`bootstrap/providers.php` enregistre `AppServiceProvider` et `AdminPanelProvider`. Sans cette ligne, le panneau `/admin` n’existe pas.

## Routes

Fichier : `routes/web.php`.

| Méthode | URL | Nom | Action |
|---------|-----|-----|--------|
| GET | `/` | `home` | `indexController@index` |
| GET | `/cv` | `cv` | `indexController@cv` |
| POST | `/contact` | `contact.store` | `indexController@store`, limité à 5 requêtes par minute |

`bootstrap/app.php` ajoute aussi `GET /up`. C’est le contrôle de santé utilisé par Render (`healthCheckPath` dans `render.yaml`). Ce n’est pas une page du portfolio.

Les URL `/admin`, `/admin/login`, `/admin/profile`, `/admin/projects`, `/admin/contacts` ne sont pas écrites dans `routes/web.php`. Filament les enregistre tout seul à partir de `AdminPanelProvider`.

## Site public

`indexController` est la seule classe contrôleur du site. Le nom commence par une minuscule : c’est le nom réel du fichier, il ne faut pas le renommer sans mettre à jour la route.

- `index()` charge les projets publiés et affiche `resources/views/index.blade.php`.
- `cv()` affiche `resources/views/cv.blade.php` et passe l’URL du PDF.
- `store()` valide, enregistre, puis envoie l’e-mail.

La page d’accueil est une longue page à ancres. Les sections ont un `id` (`home-section`, `about-section`, `projects-section`, `case-study-section`, `skills-section`, `contact-section`). Professionnel et Expertise sont fusionnés dans `#about-section`. Le texte de la plupart des sections est écrit en dur dans le Blade. Seule la liste de projets vient de la base.

Le Hero (`#home-section.hero-hud`) est la seule section immersive : calques HUD autour de l’image `public/images/hero/ironman-hero.png`, styles dans le bloc `HERO HUD` de `style.css`, comportement dans `initHeroHud()` de `main.js`. Les sections suivantes restent des blocs classiques du thème.

Le navigateur charge `public/css/style.css` (Bootstrap 4.3.1 plus les styles du thème) et des scripts jQuery dans `public/js/`. `public/js/main.js` contient les textes français et anglais (`data-i18n`) et le Hero HUD. `public/js/page-title.js` change le titre de l’onglet selon la section visible. Owl Carousel et Scrollax ne sont plus inclus sur l’accueil.

## Administration

`AdminPanelProvider` définit le panneau : chemin `admin`, connexion, profil, mode sombre forcé, marque « Narcisse », police DM Sans, couleur primaire cyan.

Filament découvre automatiquement :

- les ressources dans `app/Filament/Resources` (`ProjectResource`, `ContactResource`) ;
- les pages dans `app/Filament/Pages` (`Dashboard`) ;
- les widgets dans `app/Filament/Widgets`.

Une ressource Filament remplace, pour l’admin, le trio contrôleur + vue + formulaire. `ProjectResource` décrit le formulaire et le tableau. Les pages `ListProjects`, `CreateProject` et `EditProject` ne font qu’hériter du comportement Filament, avec un bouton « Voir le portfolio » en plus.

## Ce qui n’existe pas

- Pas de dossier `app/Services`.
- Pas de policies.
- Pas de middleware écrit dans `app/Http/Middleware`. Le rate limit du contact est déclaré sur la route. Le panneau admin utilise les middleware fournis par Filament (session, CSRF, authentification).
- Pas d’API JSON.
- `routes/console.php` ne contient que la commande d’exemple `inspire`.

## Flux

### Afficher l’accueil

`GET /` → `indexController@index` → `Project` (publiés, triés par `order`) → vue `index`.

### Envoyer un message

`POST /contact` → middleware `throttle:5,1` → `ContactRequest` → `indexController@store` → si le champ piège est vide : ligne `contacts` puis `ContactMail` via le mailer configuré → redirection vers `/#contact-section`.

Si la validation échoue, `ContactRequest` redirige lui-même vers la même ancre avec les erreurs. Il n’y a pas de page d’erreur séparée.

### Ouvrir l’admin

`GET /admin/login` → formulaire Filament → session Laravel → middleware `Authenticate` de Filament → `User::canAccessPanel()` → tableau de bord.

### Modifier un projet

Page Filament « Projets » → formulaire de `ProjectResource` → modèle `Project` → table `projects`. Au prochain chargement de `/`, `index()` relit les projets publiés. Aucun cache de cette liste n’est en place.
