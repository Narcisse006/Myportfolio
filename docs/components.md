# Éléments réutilisables

Avant d’ajouter un partial, un widget ou un bouton d’admin, regarder cette liste. Le projet est petit : la plupart des écrans n’ont pas de composant séparé, le HTML est dans la vue de la page.

## Partials Blade du site public

### `partials.seo`

- Emplacement : `resources/views/partials/seo.blade.php`
- Rôle : balise `title`, description, canonical, Open Graph, Twitter, JSON-LD de la personne.
- Paramètres optionnels passés par `@include` : `seoTitle`, `seoDescription`, `seoCanonical`, `seoImage`, `seoType`.
- Défauts écrits dans le partial : nom « Narcisse OGOUDIKPE », image `images/Moi2.jpg`.
- Réutiliser sur toute nouvelle page publique. L’accueil et le CV le font déjà.
- La balise `google-site-verification` est dans ce fichier.
- Portrait À propos de l’accueil : `images/profile/moi2.webp` (+ fallback `moi2.jpg`). L’asset SEO peut rester sur `Moi2.jpg`.

### `partials.favicon`

- Emplacement : `resources/views/partials/favicon.blade.php`
- Rôle : favicon `.ico`, PNG 32 et 64, icône Apple, `theme-color` `#52a6c4`.
- Pas de paramètre.
- Réutiliser dans le `<head>` de toute page publique.

### `partials.shell-surface-icons`

- Emplacement : `resources/views/partials/shell-surface-icons.blade.php`
- Rôle : calque décoratif d’icônes liées au métier (code, Laravel, DB, serveur, Git, terminal, sécurité, PHP) en fond des sections shell / footer / CV.
- Réutiliser tel quel sur une nouvelle section sombre Premium tech.

### `partials.custom-cursor`

- Emplacement : `resources/views/partials/custom-cursor.blade.php`
- Rôle : marque le HTML du curseur personnalisé (point, réticule, traînée de 4 points). Le script associé est `public/js/custom-cursor.js` (chargé par les pages qui en ont besoin).
- Couleur : `#52a6c4` par défaut ; `#00d4ff` (classe `custom-cursor-hud`) lorsque le pointeur est dans `#home-section.hero-hud`.
- Réutiliser tel quel si une nouvelle page publique doit garder le même curseur.

### `partials.preloader`

- Emplacement : `resources/views/partials/preloader.blade.php`
- Script : `public/js/dev-preloader.js`
- Rôle prévu : écran de chargement.
- Il n’est inclus dans aucune page. Ne pas le remettre sans décider explicitement de le réafficher.

## Configuration partagée du contenu public

### `config/portfolio.php`

- Clés : `github`, `email`, `phone_bj.display`, `phone_bj.tel`, `whatsapp.display`, `whatsapp.url`, `projects.timelux`, `projects.forum`, `projects.stock`, `projects.colis`.
- `email` lit `MAIL_TO_ADDRESS`.
- Les quatre URL `projects.*` ne servent pas à l’affichage du site. `ProjectSeeder` les lit seulement si elles ne se terminent pas par `Narcisse006`. Sinon il utilise les dépôts écrits dans le seeder.
- Réutiliser `config('portfolio...')` pour un nouveau lien de contact, plutôt que coller l’URL dans un Blade.

## Formulaire et e-mail

### `ContactRequest`

- Emplacement : `app/Http/Requests/ContactRequest.php`
- Rôle : autoriser tout le monde, valider nom / e-mail / sujet / message, messages français, redirection vers `#contact-section`.
- Le champ `company_website` court-circuite les règles.
- Réutiliser cette classe pour le `POST /contact`. Ne pas dupliquer les règles dans le contrôleur.

### `ContactMail`

- Emplacement : `app/Mail/ContactMail.php`
- Vue : `resources/views/emails/contact.blade.php`
- Constructeur : un tableau `$data` avec `name`, `email`, `subject`, `message`.
- Réutiliser pour renvoyer le même type de message. Le destinataire n’est pas dans la classe : l’appelant fait `Mail::to(...)`.

## Admin Filament

Les formulaires et tableaux de Filament (TextInput, FileUpload, TagsInput, tables) viennent de la bibliothèque. On les configure dans les ressources, on n’en crée pas une copie dans `resources/views`.

### `PortfolioLink`

- Emplacement : `app/Filament/PortfolioLink.php`
- `url()` retourne `route('home')`.
- `saved($title)` retourne une notification de succès avec un bouton « Voir le portfolio ».
- Déjà utilisé par `EditProfile`, `CreateProject`, `EditProject`.
- Réutiliser après toute sauvegarde admin qui change ce que le visiteur voit.

### Bouton « Voir le portfolio » de la barre

- Emplacement : `resources/views/filament/portfolio-button.blade.php`
- Branché par `AdminPanelProvider` sur le hook `PanelsRenderHook::USER_MENU_BEFORE`.
- C’est un bouton Filament (`x-filament::button`) qui ouvre l’accueil dans un nouvel onglet.
- Le menu utilisateur a une entrée séparée, déclarée dans le même provider. Les deux existent en même temps.

### En-tête du tableau de bord

- Emplacement : `resources/views/filament/dashboard-header.blade.php`
- Appelé par `App\Filament\Pages\Dashboard::getHeader()`.
- Variables : `$publishedCount`, `$unreadCount`.
- Le nom « Narcisse OGOUDIKPE » est écrit dans le fichier, ainsi que le CSS du bandeau.
- Ne pas en créer un second. Modifier celui-ci.

### Fenêtre de lecture d’un message

- Emplacement : `resources/views/filament/contacts/message.blade.php`
- Variable : `$record` (modèle `Contact`).
- Utilisée uniquement par l’action « Voir le message » de `ContactResource`.

### Widgets

| Classe | Rôle |
|--------|------|
| `App\Filament\Widgets\StatsOverview` | 4 chiffres : projets publiés, messages, non-lus, dernière connexion |
| `App\Filament\Widgets\LatestContacts` | Tableau des 5 derniers messages |
| `App\Filament\Widgets\RecentProjects` | Tableau des 5 derniers projets |

Ils sont listés dans `Dashboard::getWidgets()`. `$isLazy = false` sur les trois. Un nouveau widget doit être ajouté à cette méthode pour apparaître, et découvert automatiquement seulement s’il est dans `app/Filament/Widgets`.

## JavaScript du site public

| Fichier | Rôle | Quand le réutiliser |
|---------|------|---------------------|
| `public/js/main.js` | Navigation, animations du thème, traductions FR/EN, `initHeroHud()`, `initSkillsMarquee()`, `initShellReveal()`, `initShellPageMotion()` | Toute page qui a `data-i18n` ou le menu du thème. `initHeroHud` ne s’active que si `#home-section.hero-hud` est présent |
| `public/js/page-title.js` | Titre d’onglet et hash selon `[data-page-title]` | Une page longue à sections, comme l’accueil. Le CV ne le charge pas |
| `public/js/custom-cursor.js` | Curseur réticule + traînée | Avec le partial `custom-cursor` |
| `public/js/jquery.min.js`, `bootstrap.min.js`, Stellar, Waypoints, Magnific Popup | Librairies du thème Colorlib | Déjà enchaînées en bas de `index.blade.php`. Ne pas en charger une deuxième copie |

### Styles publics partagés

- Bloc `HERO HUD` dans `public/css/style.css` : variables `--hud-*`, uniquement `#home-section`.
- Bloc `SECTIONS SOMBRES PREMIUM` : variables `--section-*`, sections post-Hero.
- Bloc `SITE SHELL NAV + FOOTER` : nav glass (`#ftco-navbar.site-nav`), footer `.site-footer`, boutons `.shell-btn` (ADN Hero sans toucher le HUD).
- Marquee compétences : `.skills-marquee` + `.skill-tile` ; `initSkillsMarquee()` dans `main.js` clone les groupes pour une boucle sans trou.
- Profil public : `.shell-about` (À propos fusionnée : intro, photo, 4 cards expertise) ; boutons `.shell-btn--primary` / `--ghost`.
- Projets : `.shell-projects` / `.shell-project` (media, tags, liens url / github).
- Étude de cas : `.shell-case` (visual + panel contexte / livrables).
- Compétences : `.shell-skills` (en-tête shell) + marquee existant.
- Contact : `.shell-contact` (formulaire + aside, alerts / honeypot inchangés).
- Page CV : `body.shell-cv` / `shell-cv__*` (identité photo, panneaux, entries rail cyan).
- Motion shell : `.shell-reveal` (IntersectionObserver) + transition page (View Transitions / fade fallback). `prefers-reduced-motion` désactive le tout.
- Fil HUD : `.shell-readout` + `.hud-scroll` (pont Hero → About) ; accent warm `--section-accent-warm`.
- Fonds shell : icônes portfolio (`.shell-surface-icons`) + halos sur sections / footer / CV.

Owl Carousel et Scrollax ne sont plus chargés sur l’accueil (l’ancien Hero carrousel a été remplacé par le Hero HUD). Les fichiers restent dans `public/js/` et `public/css/` mais ne sont plus référencés.

Les fichiers `public/js/filament/` et `public/css/filament/` sont les assets publiés de Filament (`php artisan filament:upgrade` dans `composer.json`). On ne les édite pas à la main.

## Ce qui ressemble à un composant mais n’en est pas un

- `resources/views/welcome.blade.php` et `resources/js/app.js` : page d’exemple Laravel, sans route.
- `resources/css` chargé par Vite : inutilisé par l’accueil et le CV.
- Il n’y a pas de dossier `resources/views/components`. Les bouts de HTML réutilisables du site sont les partials listés plus haut.
- Pas de classes dans `app/Services`.
