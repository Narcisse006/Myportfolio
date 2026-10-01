# Journal des évolutions

Les petits correctifs de build ne sont pas listés un par un. Le détail des commits reste dans Git.

## 2026-10-01

### Modifié

- En-têtes HTTP sur toutes les pages (anti-iframe, nosniff, politique de contenu, HSTS en HTTPS).
- Le chat accepte 8 questions par minute, et au plus 200 appels Gemini par jour pour tout le site.
- Le seeder admin ne réécrit plus le mot de passe d’un compte déjà créé.
- Le seeder projets ne republie plus un projet masqué.
- Images de projets : JPEG, PNG ou WebP uniquement.
- Le conteneur Render sert le site avec FrankenPHP, plus avec `php artisan serve`.
- E-mail du formulaire limité à 255 caractères.

### Ajouté

- Trois projets publiés : Scolaris, Gestion Présence, Scanner Multi-Fonctions.
- Favicon de l’onglet : initiales « NO », style armure (or, coins cyan, point réacteur).
- Bouton « Répondre » (lien Gmail prérempli) sur Messages et le tableau de bord.
- Page admin « Réglages » pour les numéros, l’adresse et WhatsApp (`portfolio_settings`).

## 2026-09-30

### Ajouté

- Routes de section `/about`, `/projects`, `/skills`, `/contact` (même vue que l’accueil).
- Test d’échec d’envoi du formulaire : le message reste en base, session `error`.
- Statut projet (`online` / `in_progress` / `testing` / `archived`) en base, Select Filament et badge sur les cartes.
- Overlay de liens + tilt 3D sur les cartes projets.
- Portrait détouré (PNG/WebP transparent) et cadre HUD renforcé.
- Polices Rajdhani / DM Sans (Share Tech Mono conservé sur le Hero).
- Section expérience timeline préparée (`hidden`).
- Assistant IA flottant (`POST /ai/chat`) : FAQ locale + Gemini optionnel (clé hors dépôt).
- Basculeur de langue FR/EN avec drapeaux (🇬🇧 / 🇫🇷) dans la navbar.
- Raffinement UI chat : toggle icône seule, titre « Assistant Narcisse », avatar Iron Man + statut en ligne.

### Modifié

- URL de section via History API (`page-title.js`) à la place des fragments `#…-section`.
- Formulaire de contact en AJAX (pas de rechargement) ; faux succès `sessionStorage` retiré.
- Bouton d’envoi contact : état loading (« Envoi en cours… ») pendant la requête.
- Mail de contact via Resend (`onboarding@resend.dev` tant qu’aucun domaine n’est vérifié) ; bascule auto SMTP→Resend si mot de passe SMTP absent.
- Redirection classique du formulaire vers `/contact` conservée pour les POST non-AJAX.
- Navbar : lien Compétences. Sitemap mis à jour.
- Grille projets : 3 colonnes desktop, 2 tablette, 1 mobile.
- Textes publics réécrits (Hero, À propos, projets, contact, footer, meta). Adresse limitée à « Bénin », sans ville.
- Portrait du site remplacé par `images/profile/Nessi` (accueil, CV, partage).
- Les deux numéros (Bénin et Burkina Faso) apparaissent dans les coordonnées et le pied de page.
- Cartes À propos : icônes à la place des numéros, fondu décalé, soulèvement et lueur au survol.

## 2026-05-20

### Ajouté

- Première version du portfolio Laravel.
- Image Docker et déploiement Render.

## 2026-05-21

### Ajouté

- Envoi des messages de contact avec Resend.

## 2026-07-21

### Modifié

- Refonte de la page publique, hero mobile, favicon.
- Balises SEO, vérification Google, `robots.txt` et `sitemap.xml` statiques.
- Workflow GitHub qui ping le site Render toutes les 10 minutes.

## 2026-09-29

### Ajouté

- Panneau Filament `/admin` : tableau de bord, projets, messages, profil.
- Tables `projects` et `contacts`, colonne `users.last_login_at`.
- Les projets publiés de l’accueil viennent de la base.
- Le formulaire de contact enregistre une ligne avant d’envoyer l’e-mail.
- Documentation dans `docs/` et règles de travail dans `AGENTS.md`.
- Hero HUD immersif : Iron Man centré, anneaux / panneaux / particules, parallaxe curseur, séquence d’entrée 2,5 s. Assets dans `public/images/hero/` (PNG + WebP).
- Thème sombre premium des sections post-Hero (`--section-*`), chips compétences avec icônes, portrait `images/profile/` (WebP).
- Coquille Premium tech : navbar glass + footer signature (typo mono, CTA `.shell-btn`), alignés sur le langage du Hero sans HUD.
- Skills en marquee 2 rangées (tuiles icônes, défilement lent, pause hover).
- Sections Professionnel / À propos en composition Premium tech (`.shell-profile`).
- Fusion Professionnel + À propos + Expertise dans `#about-section` (`.shell-about`, photo moi2, 4 cards).
- Section Projets en composition Premium tech (`.shell-projects` / `.shell-project`).
- Étude de cas restylée en `.shell-case` (image + panel tech, CTA shell).
- Contact restylé en `.shell-contact` (formulaire + aside Premium tech) ; en-tête Skills aligné sur le shell (`.shell-skills`).
- Page CV restylée en dossier Premium tech (`shell-cv__*` : identité photo, panneaux, entries rail).
- Motion shell : reveals au scroll entre sections + transition légère entre pages (accueil ↔ CV).
- Titre de rôle harmonisé partout : « FULL-STACK DEVELOPER » (UI + SEO / schema.org).
- Fil narratif HUD hors Hero : readouts section, cue scroll ENGAGE, accent orange secondaire.
- Hero : watermark métaphore + panneau MISSION bas-droite.
- Fonds pro des sections post-Hero : icônes métier (plus de grille carrée), halos discrets.

### Modifié

- Le conteneur de production passe sur PHP 8.4, avec l’extension `intl`.
- `www-data` peut écrire dans `database/` pour créer le fichier SQLite au démarrage.
- Curseur personnalisé en réticule HUD (cyan dans le Hero, accent `#52a6c4` ailleurs).
- Cartes projets : liens séparés `url` / `github_url` ; sections post-Hero en thème sombre.

### Retiré

- Carrousel Owl et Scrollax de la page d’accueil (remplacés par le Hero HUD).

### Architecture

- Le site public (Blade, Bootstrap, `public/css/style.css`) et l’admin Filament restent séparés.
- Production Render : SQLite éphémère. Développement local : MySQL.
