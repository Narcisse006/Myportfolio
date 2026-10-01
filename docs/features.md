# Fonctionnalités

## Page d’accueil

### Objectif

Présenter Narcisse OGOUDIKPE : accroche, parcours, projets, étude de cas, expertise, compétences, biographie et contact. Une seule vue Blade, des URL propres (`/`, `/about`, `/projects`, `/skills`, `/contact`) synchronisées au scroll.

### Point d’entrée

`GET /`, nom de route `home`. Les routes `about`, `projects`, `skills` et `contact` servent la même action.

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
3. Le navigateur exécute `main.js` (menu, défilement, langue, Hero HUD) puis `page-title.js` (titre de l’onglet et chemin d’URL de section).

### Hero HUD (`#home-section`)

Section immersive unique de la page. Iron Man est centré (`public/images/hero/ironman-hero.png` + WebP 480/832). Autour : grille, radar, anneaux SVG rotatifs, lignes techniques, panneaux de données, particules canvas, lueur d’arc reactor. Watermark `.hud-watermark` (`ENGINEERING · PRECISION · SYSTEMS`) derrière la figure et panneau `.hud-mission` bas-droite pour lier la métaphore armure / code. L’identité (nom, tagline, stack `Laravel · PHP · MySQL · Filament`, boutons) est à gauche sur desktop, sous l’image sur tablette/mobile.

- Styles : bloc `/* === HERO HUD === */` dans `public/css/style.css` (variables `--hud-*`, `--mx`, `--my`).
- Comportement : `initHeroHud()` dans `public/js/main.js` (parallaxe curseur, particules, pause hors écran / onglet caché).
- Boutons : « Voir mes projets » (`/projects`, clé `pro.cv`) et « Me contacter » (`/contact`, clé `about.contact`). Pas de bouton CV dans le Hero.
- Responsive : HUD complet > 1024px ; tablette simplifiée ; mobile sans anneaux ni panneaux.
- Accessibilité : `prefers-reduced-motion: reduce` désactive rotations, parallaxe et particules.

### Thème sombre des sections (hors Hero)

Après le Hero : À propos (fusionnée), Projets, Étude de cas (`.shell-case`), Compétences (`.shell-skills`), Contact (`.shell-contact`) — palette sombre Premium tech. Navbar / footer en coquille shell. Pas d’anneaux / particules / HUD hors `#home-section`.

### Motion (sections & pages)

Au scroll, les blocs shell apparaissent en `.shell-reveal` (léger fade + rise, stagger). Navigation ancre plus douce. Entre pages (accueil ↔ CV) : View Transitions si supporté, sinon fade court. `prefers-reduced-motion` coupe les animations.

### Compétences (`#skills-section`)

En-tête centré `.shell-skills__header`, puis deux rangées marquee infinies (Backend · Outils / Front & UI · Outils) : tuiles `.skill-tile` taille fixe + même `gap`. Un groupe unique par rangée est cloné en JS jusqu’à couvrir > 2 viewports ; décalage exact `--marquee-distance` pour une boucle sans trou. Pause au survol ; `prefers-reduced-motion` désactive l’animation.

### Contact (`#contact-section`)

Composition `.shell-contact` : en-tête centré, grille égale coordonnées (gauche) + formulaire (droite), CTA WhatsApp en `.shell-btn`. Les deux numéros (`phone_bj`, `phone_bf`) sont listés sous Téléphone et dans le pied de page. Honeypot, flash/alertes et validation inchangés.

### À propos (fusionnée)

Section unique `#about-section` (après le Hero) : en-tête centré, intro + photo `images/profile/Nessi.webp` (repli `Nessi.jpg`, cadre HUD), puis 4 cards d’expertise (icône, fondu décalé à l’apparition, survol : soulèvement et lueur cyan). Les anciennes sections `#pro-section` et `#highlights-section` n’existent plus. Une section `#experience-section` (timeline) est préparée en HTML/CSS mais reste `hidden` jusqu’à activation du contenu.

### Points d’attention

- Le préloader (`resources/views/partials/preloader.blade.php`, `public/js/dev-preloader.js`) n’est inclus ni dans l’accueil ni dans le CV.
- Changer un texte visible demande souvent deux endroits : le HTML français dans le Blade, et la clé anglaise dans `public/js/main.js` (`data-i18n`). Pour le Hero : `hero.title`, `hero.stack`, plus `pro.cv` / `about.contact` pour les boutons.
- `public/css/style.css` mélange Bootstrap et les styles du thème. Une modification CSS s’y fait, pas dans Tailwind. Le bloc Hero HUD et le bloc sections sombres restent séparés.
- Owl Carousel et Scrollax ne sont plus chargés sur l’accueil : l’ancien carrousel Hero a été retiré.
- Le libellé de rôle « FULL-STACK DEVELOPER » reste sur À propos et le CV. La tagline du Hero et le footer sont des phrases. L’adresse publique est « Bénin », sans ville.
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
2. Chaque carte affiche la capture, le badge de statut, la première techno, le titre, la description, toutes les technos, puis les liens.
3. Liens en bas de carte : `url` → « En ligne » ; `github_url` → « GitHub ».
4. Au survol (comme [Simon Avosse](https://simonavosse.com/portfolio)) : carte `translateY(-10px)` + ombre, image scale 1.1, overlay sombre avec bouton rond `+` (lightbox). Pas de tilt ni de reveal au scroll sur les cartes.
5. Grille : 3 / 2 / 1 colonnes.

### Données

Table `projects` (`image`, `gallery`, `url`, `github_url`, `status`…).

### Composants réutilisés

Aucun composant Blade séparé. Lightbox : `jquery.magnific-popup.min.js` déjà chargé.

### Points d’attention

- Un projet masqué (`is_published` à faux) disparaît du site mais reste dans l’admin.
- Les images uploadées sont sur le disque `public` (`projects`, `projects/gallery`). `php artisan storage:link` en local. Sur Render, les uploads ne survivent pas au redéploiement.
- Remplir `url` (site déployé) dans Filament pour afficher le bouton sur chaque carte.

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
2. En JavaScript, l’envoi part en `fetch` AJAX vers `/contact` (URL relative) : pas de rechargement. Le bouton bascule en loading (« Envoi en cours… »). Les alertes succès / erreur s’affichent dans `#contact-feedback`.
3. Le middleware `throttle:5,1` autorise 5 envois par minute et par client. Au-delà, JSON 429 ou redirection selon le type de requête.
4. Si le champ caché `company_website` est rempli, c’est traité comme un robot : réponse « succès », sans enregistrement et sans e-mail.
5. Sinon `ContactRequest` exige nom, e-mail, sujet et message, avec des messages d’erreur en français.
6. Une ligne est créée dans `contacts` (visible immédiatement dans l’admin Filament → Messages, badge non-lus).
7. Le destinataire est `config('mail.contact.address')`, donc la variable `MAIL_TO_ADDRESS`.
8. Le mailer prévu est `resend` (local et Render). Sans domaine vérifié chez Resend, `MAIL_FROM_ADDRESS` = `onboarding@resend.dev`. Gmail SMTP reste possible (`MAIL_MAILER=smtp` + mot de passe d’application).
9. Si SMTP est choisi sans mot de passe mais qu’une `RESEND_KEY` est présente, le contrôleur bascule automatiquement sur Resend.
10. `ContactMail` part avec le sujet `Portfolio | {sujet}` et un reply-to égal à l’e-mail du visiteur.
11. Succès ou erreur : JSON `{ ok, message }` en AJAX, ou redirection vers `/contact` en POST classique.

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

Composition visuelle : dossier Premium tech (`shell-cv__*`) — bandeau identité photo + coins HUD, contacts en tuiles, colonnes profil/compétences en panneaux, grille d’ambiance. Nav glass + `.shell-btn`. Portrait `images/profile/Nessi.webp`.

## Traduction français / anglais

### Objectif

Basculer les textes marqués sans recharger la page côté serveur.

### Point d’entrée

Lien `#lang-toggle` dans la navigation de l’accueil et du CV (drapeau + code de la langue cible : 🇬🇧 EN / 🇫🇷 FR).

### Fichiers principaux

- `public/js/main.js`, objet `translations` et fonction `translatePage`
- Attributs `data-i18n`, `data-i18n-html`, `data-i18n-placeholder` dans les vues
- Styles `.lang-toggle` / `.lang-toggle-flag` dans `public/css/style.css`

### Flux

1. Au clic, `translatePage` remplace le texte des nœuds marqués et met à jour le drapeau + le libellé du basculeur.
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

Le formulaire enregistre titre, ordre, description, technologies, image de couverture, captures (`gallery`), site déployé (`url`), GitHub, statut et interrupteur « Publié ». L’action « Masquer » ou « Publier » inverse `is_published` sans ouvrir le formulaire. Après création ou modification, une notification propose d’ouvrir le site.

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

## Assistant IA du portfolio

### Objectif

Répondre aux questions d’un visiteur sur le profil, les projets, la disponibilité et le contact, sans exposer la clé API. L’assistant reste utilisable même si Gemini est saturé ou absente.

### Point d’entrée

Bouton flottant bas droite sur l’accueil. `POST /ai/chat`, nom de route `ai.chat`.

### Fichiers principaux

- `app/Http/Controllers/AiChatController.php`
- `resources/views/index.blade.php` (markup `.ai-chat`)
- `public/css/style.css` (bloc AI CHAT HUD)
- `public/js/main.js` (`initAiChat`)
- `config/services.php` (`gemini.key`, `gemini.model`)

### Flux

1. Le visiteur ouvre le panneau, saisit une question.
2. Le navigateur envoie un JSON vers `/ai/chat` avec le jeton CSRF.
3. Avec `GEMINI_API_KEY`, le contrôleur tente Gemini (`generateContent`), avec quelques modèles de secours si le premier échoue.
4. Sans clé, ou si Gemini échoue (surcharge, quota, timeout), réponse locale basée sur les projets publiés et une FAQ portfolio (`source: local`).
5. Historique plafonné en session ; JSON `reply` (+ `source`). Si la question ou la réponse parle de contact / profil / dispo, le JSON inclut `actions_intro` et `actions` (bouton WhatsApp uniquement, via `config/portfolio.php`). Les boutons n’apparaissent que sous une réponse bot, pas sur le message d’accueil.

### Données

Session fichier (`ai_chat_history`). Aucune table dédiée. La FAQ locale lit `Project` publiés et `config/portfolio.php` (e-mail, les deux téléphones, WhatsApp).

### Points d’attention

La clé n’apparaît jamais dans le HTML. Créer `GEMINI_API_KEY` dans [Google AI Studio](https://aistudio.google.com/apikey), puis la poser en local et sur Render (`sync: false`). Défaut modèle : `gemini-flash-lite-latest`.