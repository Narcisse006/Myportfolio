# Décisions techniques

## 2026-05-21 — Envoyer le formulaire avec Resend

### Contexte

Le site doit transmettre un message de visiteur vers une boîte réelle, depuis Render, sans serveur SMTP maison.

### Décision

Le mailer de production est `resend` (`render.yaml`, dépendance `resend/resend-php`). Le destinataire est `MAIL_TO_ADDRESS`, lu via `config('mail.contact.address')`.

### Raisonnement

Resend fournit une API et une clé, ce qui tient dans les variables d’environnement Render. La clé `mail.contact` évite `mail.to`, que Laravel traite comme une adresse forcée pour tous les e-mails.

### Conséquences

Sans `RESEND_KEY` en production, `indexController` n’envoie pas l’e-mail et affiche un message d’indisponibilité. Le message peut déjà être enregistré dans `contacts`. En local, les tests remplacent le mailer par `array` et n’appellent pas Resend.

## 2026-07-21 — Site public statique côté présentation, SEO dans les vues

### Contexte

Le portfolio doit être lisible par Google : titre, description, favicon, sitemap, robots.

### Décision

Les balises sont dans `resources/views/partials/seo.blade.php` et `partials/favicon.blade.php`. `public/robots.txt` et `public/sitemap.xml` sont des fichiers statiques. Un workflow GitHub ping le site toutes les 10 minutes.

### Raisonnement

Ces fichiers sont servis sans passer par une route Laravel dynamique. Le healthcheck `/up` et la page d’accueil restent joignables pour limiter l’endormissement de l’instance gratuite.

### Conséquences

Changer le domaine ou l’URL canonique demande de vérifier le partial SEO, `APP_URL`, le sitemap et le workflow `keep-alive.yml`.

## 2026-09-29 — Deux fronts dans un seul Laravel

### Contexte

Il fallait un espace pour modifier les projets et lire les messages, sans reconstruire le site public.

### Décision

Filament 3.3 sur `/admin`. Le site public reste les vues Blade et `public/css/style.css`. Tailwind / Vite ne habillent pas ces pages.

### Raisonnement

Filament apporte formulaires, tableaux, login et uploads. Sa version 3.3 est celle qui s’installe avec Laravel 12. Mélanger son CSS avec le thème Bootstrap du site casserait la page publique.

### Conséquences

Une modification visuelle du site se fait dans `public/css/style.css` et les vues Blade. Une modification de l’admin se fait dans `app/Filament` et `resources/views/filament`. Les deux ne partagent pas de composants.

## 2026-09-29 — Les projets affichés viennent de la base

### Contexte

Les projets étaient du texte fixe. L’admin doit pouvoir les publier ou les masquer.

### Décision

Table `projects`. L’accueil lit les lignes publiées. `config/portfolio.php` ne garde que les liens de contact et, pour le seeder, des URL GitHub de secours.

### Raisonnement

Un seul endroit à modifier ensuite : l’écran « Projets ». Masquer un projet ne demande pas d’éditer le HTML.

### Conséquences

Après un déploiement, le seeder recrée les projets de démo s’ils n’existent pas (recherche par titre). Le contenu saisi dans l’admin sur Render est perdu si le fichier SQLite est recréé.

## 2026-09-29 — Un seul type d’utilisateur

### Contexte

L’admin ne sert qu’au propriétaire du portfolio.

### Décision

Pas de rôles ni de policies. `User::canAccessPanel()` retourne `true`. Le compte vient des variables `ADMIN_*`.

### Raisonnement

Un deuxième rôle n’a pas d’écran ni de règle métier. Ajouter une colonne rôle sans s’en servir compliquerait le login.

### Conséquences

Toute personne qui possède un enregistrement `users` entre dans tout le panneau. Il ne faut pas créer d’autres utilisateurs sans revoir `canAccessPanel()`.

## 2026-09-29 — PHP 8.4 dans l’image Docker

### Contexte

Le `composer.lock` contient des paquets Symfony 8.1 qui exigent PHP 8.4.1 ou plus. Une image PHP 8.2 s’arrêtait au démarrage dans `vendor/composer/platform_check.php`.

### Décision

Les deux étapes du `Dockerfile` utilisent `php:8.4-cli`. L’extension `intl` est installée avant `composer install`, parce que Filament la demande. `composer.json` déclare `"php": "^8.4"` et `config.platform.php` = `8.4.1`.

### Raisonnement

Ignorer le contrôle de version PHP laisserait démarrer un conteneur qui peut casser plus loin sur une API Symfony. Aligner l’image, le `composer.json` et le lock évite qu’un prochain `composer update` reparte sur une autre version.

### Conséquences

La machine de développement et Render doivent rester sur PHP 8.4. Changer l’image sans régénérer le lock, ou l’inverse, reproduit l’échec de démarrage. Depuis le 2026-10-01, le processus qui sert le site n’est plus `php:8.4-cli` : le runtime est FrankenPHP (toujours PHP 8.4). L’étape Composer reste `php:8.4-cli`.

## 2026-09-29 — SQLite sur Render, MySQL en local

### Contexte

Le plan Render utilisé n’a pas de base MySQL dans `render.yaml`. Le développement local, lui, vise MySQL.

### Décision

Le code ne force pas le moteur. `.env` local utilise MySQL. Le conteneur, sans `DB_CONNECTION`, suit le défaut `sqlite` de `docker/start.sh` et crée `database/database.sqlite`.

### Raisonnement

Les migrations n’utilisent pas de syntaxe propre à MySQL (`last_login_at` n’a pas de clause `after()`). Les deux moteurs exécutent les mêmes migrations. Les tests utilisent une troisième variante : SQLite mémoire.

### Conséquences

Les données de production ne survivent pas à un nouveau déploiement. Les images du disque `public` non plus. Un hébergement durable demanderait une base externe et un disque persistant, qui n’existent pas dans le dépôt aujourd’hui.

## 2026-09-29 — Le conteneur écrit la base en tant que `www-data`

### Contexte

Le `Dockerfile` passe à `USER www-data` pour ne pas servir l’application en root. Le premier démarrage a échoué : `touch database/database.sqlite` renvoyait « Permission denied ».

### Décision

À la construction de l’image, `storage`, `bootstrap/cache` et `database` sont donnés à `www-data`.

### Raisonnement

`config:cache` écrit dans `bootstrap/cache`. Les migrations écrivent le fichier SQLite dans `database`. Les logs et les sessions fichier écrivent dans `storage`. Ces trois dossiers doivent être modifiables par l’utilisateur du processus.

### Conséquences

Un nouveau dossier écrit au runtime doit être ajouté au `chown` du `Dockerfile`, sinon le conteneur s’arrête au démarrage (`set -eu` dans `docker/start.sh`).

## 2026-09-30 — Contact via Resend sans domaine vérifié

### Contexte

Gmail SMTP local exige un mot de passe d’application souvent absent. Resend refuse `MAIL_FROM_ADDRESS` sur `gmail.com` sans domaine vérifié.

### Décision

`MAIL_MAILER=resend` avec `MAIL_FROM_ADDRESS=onboarding@resend.dev` tant qu’aucun domaine n’est vérifié. Le destinataire reste `MAIL_TO_ADDRESS`. `indexController` bascule SMTP→Resend si le mot de passe SMTP est vide mais `RESEND_KEY` est présente. Les messages restent créés dans `contacts` avant l’envoi (admin Messages).

### Conséquences

Le formulaire fonctionne sans domaine custom. Quand un domaine sera vérifié chez Resend, remplacer `MAIL_FROM_ADDRESS` par une adresse de ce domaine (local et Render).

## 2026-10-01 — FrankenPHP à la place de `php artisan serve`

### Contexte

Le conteneur Render lançait `php artisan serve`. Ce serveur est prévu pour le développement : il annonce la version de PHP et exécute tout fichier `.php` placé sous `public/`.

### Décision

Le runtime Docker est `dunglas/frankenphp:1-php8.4`. `docker/start.sh` lance FrankenPHP avec `docker/Caddyfile`. L’étape Composer reste `php:8.4-cli`, toujours en PHP 8.4. `expose_php` est désactivé. Seul `public/index.php` peut être exécuté.

### Raisonnement

FrankenPHP sert les fichiers statiques et PHP sans ajouter Octane ni une dépendance Composer. Le healthcheck `/up` et le port `PORT` restent les mêmes, donc Render n’a pas à changer de type de service.

### Conséquences

Un déploiement est nécessaire pour que la production quitte `php artisan serve`. En local, `php artisan serve` reste la commande de développement.

Le binaire FrankenPHP est livré avec la capacité `cap_net_bind_service` (pour écouter sur les ports 80 et 443). Render interdit à `www-data` d’exécuter un binaire qui a cette capacité : le conteneur s’arrête avec `Operation not permitted`. Le `Dockerfile` retire cette capacité (`setcap -r`). Le service écoute sur le port `PORT` (10000), donc elle n’est pas nécessaire.

## 2026-10-01 — En-têtes HTTP et plafond du chat

### Contexte

Les réponses ne portaient aucun en-tête qui empêche d’afficher le site dans une fenêtre intégrée. Le chat public pouvait appeler Gemini vingt fois par minute et par adresse, sans plafond sur la journée.

### Décision

`SecurityHeaders` est ajouté à toutes les réponses. Le chat passe à 8 questions par minute, avec un plafond journalier Gemini (défaut 200, variable `GEMINI_DAILY_LIMIT`). `SESSION_SECURE_COOKIE=true` est écrit dans `render.yaml`.

### Raisonnement

Le blocage des iframes protège l’admin déjà connecté. Le plafond journalier protège la clé même si plusieurs adresses se relaient. Les scripts inline du site et Alpine (Filament) restent autorisés, sinon l’accueil et l’admin cessent de fonctionner.

### Conséquences

Une politique de contenu plus stricte (sans `unsafe-inline`) demanderait de sortir les scripts des vues Blade et de revoir Filament. Ce n’est pas fait ici.

## 2026-09-30 — Assistant portfolio (FAQ locale + Gemini optionnel)

### Contexte

Les visiteurs doivent pouvoir poser des questions sur le profil sans clé API côté client. Gemini (quota gratuit) est parfois saturé ou indisponible.

### Décision

`POST /ai/chat` géré par `AiChatController`. Tentative Gemini si `GEMINI_API_KEY` est présente, avec modèles de secours. Sinon (ou en échec) : assistant local FAQ + projets publiés. Historique en session fichier, plafonné. Pas de dossier `app/Services`.

### Raisonnement

Un portfolio a un jeu de questions borné. La FAQ locale garantit une réponse utile sans dépendre de Google. Gemini reste un bonus quand l’API répond.

### Conséquences

Le chat fonctionne sans clé. Sur Render, la clé reste optionnelle ; si elle est saisie, redéployer pour que `config:cache` la prenne.