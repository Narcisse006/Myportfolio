# Fonctionnalités

## Page d’accueil

### Objectif

Présenter Narcisse OGOUDIKPE : accroche, parcours, projets, étude de cas, expertise, compétences, biographie et contact. La page est une seule URL avec des ancres.

### Point d’entrée

`GET /`, nom de route `home`.

### Fichiers principaux

- `app/Http/Controllers/indexController.php`, méthode `index`
- `resources/views/index.blade.php`
- `resources/views/partials/seo.blade.php`
- `resources/views/partials/favicon.blade.php`
- `resources/views/partials/custom-cursor.blade.php`
- `public/css/style.css`
- `public/js/main.js`
- `public/js/page-title.js`
- `config/portfolio.php` pour l’e-mail, le téléphone, WhatsApp et le lien GitHub du pied de page

### Flux

1. Le contrôleur lit les projets publiés.
2. La vue affiche les sections dans l’ordre du fichier Blade.
3. Le navigateur exécute `main.js` (menu, défilement, langue, Hero HUD) puis `page-title.js` (titre de l’onglet et ancre dans l’URL).

### Hero HUD (`#home-section`)

Section immersive unique de la page. Iron Man est centré (`public/images/hero/ironman-hero.png` + WebP 480/832). Autour : grille, radar, anneaux SVG rotatifs, lignes techniques, panneaux de données, particules canvas, lueur d’arc reactor. Watermark `.hud-watermark` (`ENGINEERING · PRECISION · SYSTEMS`) derrière la figure et panneau `.hud-mission` bas-droite pour lier la métaphore armure / code. L’identité (nom, titre FULL-STACK DEVELOPER, stack, boutons) est à gauche sur desktop, sous l’image sur tablette/mobile.

- Styles : bloc `/* === HERO HUD === */` dans `public/css/style.css` (variables `--hud-*`, `--mx`, `--my`).
- Comportement : `initHeroHud()` dans `public/js/main.js` (parallaxe curseur, particules, pause hors écran / onglet caché).
- Boutons : « Voir mes projets » (`#projects-section`, clé `pro.cv`) et « Me contacter » (`#contact-section`, clé `about.contact`). Pas de bouton CV dans le Hero.
- Responsive : HUD complet > 1024px ; tablette simplifiée ; mobile sans anneaux ni panneaux.
- Accessibilité : `prefers-reduced-motion: reduce` désactive rotations, parallaxe et particules.

### Thème sombre des sections (hors Hero)

Après le Hero : À propos (fusionnée), Projets, Étude de cas (`.shell-case`), Compétences (`.shell-skills`), Contact (`.shell-contact`) — palette sombre Premium tech. Navbar / footer en coquille shell. Pas d’anneaux / particules / HUD hors `#home-section`.

### Motion (sections & pages)

Au scroll, les blocs shell apparaissent en `.shell-reveal` (léger fade + rise, stagger). Navigation ancre plus douce. Entre pages (accueil ↔ CV) : View Transitions si supporté, sinon fade court. `prefers-reduced-motion` coupe les animations.

### Compétences (`#skills-section`)

En-tête centré `.shell-skills__header`, puis deux rangées marquee infinies (Backend · Outils / Front & UI · Outils) : tuiles `.skill-tile` taille fixe + même `gap`. Un groupe unique par rangée est cloné en JS jusqu’à couvrir > 2 viewports ; décalage exact `--marquee-distance` pour une boucle sans trou. Pause au survol ; `prefers-reduced-motion` désactive l’animation.

### Contact (`#contact-section`)

Composition `.shell-contact` : en-tête centré, grille égale coordonnées (gauche) + formulaire (droite), CTA WhatsApp en `.shell-btn`. Honeypot, flash/alertes et validation inchangés.

### À propos (fusionnée)

Section unique `#about-section` (après le Hero) : en-tête centré, intro + photo `images/profile/moi2.webp`, puis 4 cards d’expertise (ex-`#highlights-section`). Les anciennes sections `#pro-section` et `#highlights-section` n’existent plus. Pas de timeline.

### Points d’attention

- Le préloader (`resources/views/partials/preloader.blade.php`, `public/js/dev-preloader.js`) n’est inclus ni dans l’accueil ni dans le CV.
- Changer un texte visible demande souvent deux endroits : le HTML français dans le Blade, et la clé anglaise dans `public/js/main.js` (`data-i18n`). Pour le Hero : `hero.title`, `hero.stack`, plus `pro.cv` / `about.contact` pour les boutons.
- `public/css/style.css` mélange Bootstrap et les styles du thème. Une modification CSS s’y fait, pas dans Tailwind. Le bloc Hero HUD et le bloc sections sombres restent séparés.
- Owl Carousel et Scrollax ne sont plus chargés sur l’accueil : l’ancien carrousel Hero a été retiré.
- Titre de rôle unique partout : « FULL-STACK DEVELOPER » (Hero, À propos, CV, footer, SEO / schema). Laravel reste dans la stack et les descriptions techniques.
- Fil HUD hors Hero : readouts `.shell-readout` (STATUS / TARGET / …), cue scroll `ENGAGE` vers `#about-section`, accent orange `#ff6b00` discret. Pas d’anneaux / particules hors Hero.
- Fonds sections : icônes portfolio discrètes (code, Laravel, DB, Git…) via `partials.shell-surface-icons`, + halos cyan/orange.

### Données

Table `projects` pour la section projets. Le reste du texte est dans le Blade et dans les dictionnaires de `main.js`.

### Composants réutilisés

Les partials `seo`, `favicon` et `custom-cursor`. La page CV les réutilise aussi.

## Liste des projets publiés

### Objectif

Montrer sur l’accueil uniquement les projets marqués publiés, dans l’ordre choisi dans l’admin. Composition : `.shell-projects` / `.shell-project`.

### Point d’entrée

Section `#projects-section` de l’accueil.

### Fichiers principaux

- `indexController::index`
- Boucle `@forelse ($projects as $project)` dans `resources/views/index.blade.php`
- `app/Models/Project.php`, accesseur `imageUrl`

### Flux

1. Requête : `is_published = true`, tri `order` croissant.
2. Chaque carte affiche la première techno, le titre, la description, toutes les technos, puis les liens.
3. Liens conditionnels séparés : `url` → « Voir le projet » (`projects.view`) ; `github_url` → « GitHub » (`projects.github`). Les deux peuvent coexister. Sans aucun des deux, pas de lien.
4. L’image de fond utilise `$project->image_url` (accesseur). Sans image, le bloc reste vide.

### Données

Table `projects`.

### Composants réutilisés

Aucun composant Blade séparé : le HTML de la carte est dans `index.blade.php`.

### Points d’attention

- Un projet masqué (`is_published` à faux) disparaît du site mais reste dans l’admin.
- L’image uploadée dans l’admin est un fichier du disque `public` (`storage/app/public/projects`). L’accesseur la transforme en URL `/storage/...`. Il faut `php artisan storage:link` en local. Sur Render, le disque du conteneur est recréé à chaque déploiement : les images uploadées ne survivent pas à un redéploiement.
- Une valeur qui commence par `images/` est servie depuis `public/images`. Une valeur `http://` ou `https://` est utilisée telle quelle.

## Formulaire de contact

### Objectif

Recevoir un message, le garder dans l’admin, et l’envoyer par e-mail.

### Point d’entrée

`POST /contact`, nom de route `contact.store`. Formulaire dans `#contact-section`.

### Fichiers principaux

- `resources/views/index.blade.php` (formulaire)
- `app/Http/Requests/ContactRequest.php`
- `app/Http/Controllers/indexController.php`, méthode `store`
- `app/Mail/ContactMail.php`
- `resources/views/emails/contact.blade.php`
- `config/mail.php`, clé `contact.address`
- `bootstrap/app.php` (message affiché quand la limite de tentatives est atteinte)

### Flux

1. Le visiteur envoie le formulaire. Laravel vérifie le jeton CSRF.
2. Le middleware `throttle:5,1` autorise 5 envois par minute et par client. Au-delà, redirection vers l’accueil avec le message « Trop de tentatives… ».
3. Si le champ caché `company_website` est rempli, c’est traité comme un robot : redirection « succès », sans enregistrement et sans e-mail.
4. Sinon `ContactRequest` exige nom, e-mail, sujet et message, avec des messages d’erreur en français. En cas d’échec, retour au formulaire avec les champs saisis.
5. Une ligne est créée dans `contacts`.
6. Le destinataire est `config('mail.contact.address')`, donc la variable `MAIL_TO_ADDRESS`.
7. En production, l’envoi est refusé si le mailer est `log`, ou si le mailer est `resend` sans `RESEND_KEY`. Le message est quand même déjà enregistré en base.
8. `ContactMail` part avec le sujet `Portfolio | {sujet}` et un reply-to égal à l’e-mail du visiteur.
9. Succès ou erreur : redirection vers `/#contact-section`.

### Données

Table `contacts`. Le message n’est pas relié à un utilisateur.

### Composants réutilisés

`ContactRequest` pour toute validation de ce formulaire. `ContactMail` pour l’e-mail.

### Points d’attention

- L’enregistrement en base a lieu avant l’envoi de l’e-mail. Un échec Resend laisse donc un message visible dans l’admin.
- Le champ `company_website` doit rester caché. Le retirer ou le rendre visible casse le piège anti-robot.
- Ne pas déplacer l’adresse du destinataire vers `mail.to` : Laravel interprète `mail.to` comme une adresse imposée à tous les e-mails et exige aussi un nom. Le projet utilise `mail.contact.address` pour éviter ça.

## Page CV

### Objectif

Afficher un CV HTML et proposer le téléchargement du PDF.

### Point d’entrée

`GET /cv`, nom de route `cv`.

### Fichiers principaux

- `indexController::cv`
- `resources/views/cv.blade.php`
- `public/js/main.js` (textes `cv.*`)

### Flux

Le contrôleur passe `pdfUrl` = `asset('CV-Narcisse.pdf')` et `pageUrl` = la route `cv`. La vue affiche le CV et un lien de téléchargement vers ce PDF.

### Données

Aucune table. Le contenu du CV est dans le Blade et dans `main.js`.

### Composants réutilisés

`partials.seo`, `partials.favicon`, `partials.custom-cursor`, bouton de langue de `main.js`.

### Points d’attention

Le contrôleur pointe vers `public/CV-Narcisse.pdf`. `DEPLOY-RENDER.md` citait un autre nom de fichier. Aucun PDF n’est présent dans `public/` au moment de cette documentation : le bouton de téléchargement vise un fichier absent du dépôt.

Composition visuelle : dossier Premium tech (`shell-cv__*`) — bandeau identité photo + coins HUD, contacts en tuiles, colonnes profil/compétences en panneaux, grille d’ambiance. Nav glass + `.shell-btn`. Portrait `images/profile/moi2`.

## Traduction français / anglais

### Objectif

Basculer les textes marqués sans recharger la page côté serveur.

### Point d’entrée

Lien `#lang-toggle` dans la navigation de l’accueil et du CV.

### Fichiers principaux

- `public/js/main.js`, objet `translations` et fonction `translatePage`
- Attributs `data-i18n`, `data-i18n-html`, `data-i18n-placeholder` dans les vues

### Flux

1. Au clic, `translatePage` remplace le texte des nœuds marqués.
2. La langue est gardée dans `localStorage` sous la clé `siteLang`.
3. Les messages flash du formulaire (succès, erreur) viennent du serveur, en français. Ils ne passent pas par `data-i18n`.

### Données

Aucune.

### Composants réutilisés

Le même script et le même bouton sur l’accueil et le CV.

### Points d’attention

Un texte ajouté seulement dans le Blade reste en français quand le visiteur passe en anglais. Il faut une clé dans `translations.fr` et `translations.en`.

## Espace admin

### Objectif

Gérer les projets, lire les messages et modifier le compte qui sert à se connecter.

### Point d’entrée

`/admin`. Connexion : `/admin/login`. Profil : `/admin/profile`.

### Fichiers principaux

- `app/Providers/Filament/AdminPanelProvider.php`
- `app/Filament/Pages/Dashboard.php`
- `app/Filament/Widgets/StatsOverview.php`
- `app/Filament/Widgets/LatestContacts.php`
- `app/Filament/Widgets/RecentProjects.php`
- `resources/views/filament/dashboard-header.blade.php`
- `resources/views/filament/portfolio-button.blade.php`
- `app/Filament/PortfolioLink.php`

### Flux

1. Après connexion, Filament affiche `Dashboard`.
2. L’en-tête montre le nom écrit en dur « Narcisse OGOUDIKPE », le nombre de projets publiés et le nombre de messages non lus.
3. Trois widgets suivent : statistiques, 5 derniers messages, 5 derniers projets. Ils ne sont pas différés (`$isLazy = false`), donc leur HTML est dans la première réponse.
4. Le bouton « Voir le portfolio » ouvre `/` dans un nouvel onglet. Il est affiché dans la barre (hook `USER_MENU_BEFORE`) et dans le menu utilisateur.

### Données

`projects`, `contacts`, et `users.last_login_at` pour la statistique de dernière connexion.

### Composants réutilisés

`PortfolioLink` pour l’URL du site et la notification « Voir le portfolio » après une sauvegarde.

### Points d’attention

Le nom du bandeau n’est pas le nom du compte connecté. Le changer se fait dans `dashboard-header.blade.php`. Le test `ProjectListingTest` vérifie la présence de ce texte.

## Gestion des projets dans l’admin

### Objectif

Créer, modifier, publier, masquer et supprimer un projet.

### Point d’entrée

Menu « Projets » : `/admin/projects`.

### Fichiers principaux

- `app/Filament/Resources/ProjectResource.php`
- `app/Filament/Resources/ProjectResource/Pages/ListProjects.php`
- `app/Filament/Resources/ProjectResource/Pages/CreateProject.php`
- `app/Filament/Resources/ProjectResource/Pages/EditProject.php`
- `app/Models/Project.php`

### Flux

Le formulaire enregistre titre, ordre, description, technologies (liste de tags), image, URL, URL GitHub et interrupteur « Publié ». L’action « Masquer » ou « Publier » inverse `is_published` sans ouvrir le formulaire. Après création ou modification, une notification propose d’ouvrir le site.

### Données

Table `projects`. `tech_stack` est un tableau JSON. `order` décide de l’ordre sur le site public.

### Composants réutilisés

`PortfolioLink` dans les pages créer et modifier.

### Points d’attention

L’image est limitée à 2 Mo, stockée sur le disque `public`, dossier `projects`.

## Boîte de messages

### Objectif

Lire les messages reçus depuis le site et les marquer comme lus. On ne crée pas un message depuis l’admin.

### Point d’entrée

Menu « Messages » : `/admin/contacts`. Le badge du menu compte les lignes dont `read_at` est vide.

### Fichiers principaux

- `app/Filament/Resources/ContactResource.php`
- `app/Filament/Resources/ContactResource/Pages/ListContacts.php`
- `app/Models/Contact.php`, méthode `markAsRead`
- `resources/views/filament/contacts/message.blade.php`

### Flux

1. La liste est triée du plus récent au plus ancien.
2. « Voir le message » ouvre une fenêtre et appelle `markAsRead()`.
3. « Marquer comme lu » fait la même chose sans ouvrir le texte. Le bouton est masqué si le message est déjà lu.
4. La suppression retire la ligne. Elle ne prévient pas l’expéditeur.

### Données

Table `contacts`. `read_at` vide signifie non lu.

### Composants réutilisés

La vue `filament.contacts.message` pour le contenu de la fenêtre.

### Points d’attention

`canCreate()` retourne `false`. Il n’y a pas de page d’édition.

## Profil admin

### Objectif

Changer le nom, l’e-mail et, si on le souhaite, le mot de passe du compte connecté.

### Point d’entrée

Menu utilisateur « Mon profil », URL `/admin/profile`.

### Fichiers principaux

- `app/Filament/Pages/Auth/EditProfile.php`
- `app/Models/User.php`

### Flux

Filament enregistre le formulaire sur le modèle `User`. Le mot de passe n’est écrit que si le champ est rempli. Le cast `hashed` du modèle chiffre la valeur. Il ne faut pas appeler `Hash::make` une seconde fois dans cette page.

### Données

Table `users`.

### Composants réutilisés

`PortfolioLink` pour le bouton et la notification de sauvegarde.

### Points d’attention

La classe a `$isDiscovered = false` et elle est branchée explicitement par `->profile(EditProfile::class)` dans le provider. La découvrir automatiquement en plus créerait une deuxième page.
