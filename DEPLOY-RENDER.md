# Déployer le portfolio sur Render (gratuit)

Guide pour mettre en ligne **MyPortfolio** sur [Render](https://render.com).

## Prérequis

- Compte [GitHub](https://github.com)
- Compte [Render](https://render.com) (gratuit)
- Le projet poussé sur GitHub (sans le fichier `.env`)
- Le PDF `public/CV_Narcisse_Ogoudikpe_DevWeb.pdf` présent dans le dépôt

## 1. Préparer GitHub

```bash
git init
git add .
git commit -m "Portfolio prêt pour Render"
git branch -M main
git remote add origin https://github.com/VOTRE_USER/VOTRE_REPO.git
git push -u origin main
```

> Ne commitez **jamais** `.env` (déjà dans `.gitignore`).

## 2. Créer le service sur Render

1. [dashboard.render.com](https://dashboard.render.com) → **New +** → **Blueprint**  
   *ou* **Web Service** si vous préférez configurer à la main.
2. Connectez votre dépôt GitHub et choisissez le repo du portfolio.
3. Si vous utilisez le fichier `render.yaml` à la racine, Render propose d’appliquer le blueprint → **Apply**.
4. Sinon, configurez manuellement :
   - **Environment** : `Docker`
   - **Branch** : `main`
   - **Dockerfile Path** : `./Dockerfile`
   - **Plan** : `Free`
   - **Region** : `Frankfurt` (ou la plus proche de vous)

## 3. Variables d’environnement (obligatoires)

Dans **Environment** du service, ajoutez ou vérifiez :

| Variable | Valeur |
|----------|--------|
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_KEY` | Générer avec `php artisan key:generate --show` en local, ou laisser Render générer (`generateValue` dans blueprint) |
| `APP_URL` | `https://VOTRE-SERVICE.onrender.com` *(après le 1er déploiement, URL exacte de Render)* |
| `LOG_CHANNEL` | `stderr` |
| `SESSION_DRIVER` | `file` |
| `CACHE_STORE` | `file` |
| `QUEUE_CONNECTION` | `sync` |

### Email (formulaire de contact) — Resend

Sans `RESEND_KEY`, le contact ne part pas (mode `log` ou erreur).

1. Créez un compte sur [resend.com](https://resend.com) (gratuit : ~100 emails/jour).
2. **API Keys** → créez une clé → copiez `re_...`
3. Pour les **tests** (sans domaine) : utilisez `onboarding@resend.dev` comme expéditeur.
4. Pour la **prod** : ajoutez et vérifiez votre domaine dans Resend → utilisez par ex. `contact@votredomaine.com`.

Dans Render → **Environment** :

| Variable | Valeur |
|----------|--------|
| `MAIL_MAILER` | `resend` |
| `RESEND_KEY` | `re_votre_cle_api` |
| `MAIL_FROM_ADDRESS` | `onboarding@resend.dev` *(tests)* ou email vérifié sur votre domaine |
| `MAIL_FROM_NAME` | `Portfolio Narcisse` |

5. **Save** puis **Manual Deploy**.

> Les messages du formulaire arrivent sur l’adresse définie par `MAIL_TO_ADDRESS` (par défaut `ogoudikpenarcisse@gmail.com`). L’expéditeur (`MAIL_FROM_ADDRESS`) doit être autorisé par Resend.

## 4. Déployer

1. **Create Web Service** / lancer le déploiement.
2. Attendre le build Docker (5–15 min la première fois).
3. Quand l’URL est active, mettez à jour `APP_URL` avec cette URL exacte → **Save** → **Manual Deploy** si besoin.

## 5. Vérifications

- [ ] Page d’accueil : `https://xxx.onrender.com`
- [ ] Page CV : `https://xxx.onrender.com/cv`
- [ ] PDF téléchargeable
- [ ] Formulaire contact → e-mail reçu
- [ ] Health check : `https://xxx.onrender.com/up`

## Plan gratuit — à savoir

- Le site **se met en veille** après ~15 min sans visite → premier chargement lent (normal).
- Le disque est **éphémère** : pas de base MySQL locale persistante (le portfolio n’en a pas besoin avec `SESSION_DRIVER=file`).
- Pour un usage pro continu, un petit plan payant ou un domaine personnalisé reste optionnel.

## Domaine personnalisé (ex. narcisseogoudikpe.com)

L’URL `https://xxx.onrender.com` est fournie par Render. Pour avoir **narcisseogoudikpe.com**, il faut **acheter** le nom de domaine, puis le brancher sur Render.

### A. Acheter le domaine

1. Choisissez un registrar (ex. [Namecheap](https://www.namecheap.com), [OVH](https://www.ovh.com), [Cloudflare Registrar](https://www.cloudflare.com/products/registrar/), [Google Domains / Squarespace](https://domains.squarespace.com)).
2. Cherchez `narcisseogoudikpe.com` (ou `.bj`, `.fr`, `.dev` si `.com` est pris).
3. Achetez-le (souvent ~10–15 € / an pour un `.com`).

### B. Brancher le domaine sur Render

1. Dashboard Render → votre service (**myportfolio-lvn8** ou équivalent) → **Settings** → **Custom Domains**.
2. **Add Custom Domain** → entrez `narcisseogoudikpe.com` (et idéalement aussi `www.narcisseogoudikpe.com`).
3. Render affiche les enregistrements DNS à créer (souvent un **CNAME** vers `xxx.onrender.com`, ou des **A/AAAA** selon le cas).

### C. Configurer le DNS chez le registrar

Chez Namecheap / OVH / Cloudflare, créez exactement ce que Render indique, par exemple :

| Type | Nom / Host | Valeur |
|------|------------|--------|
| CNAME | `www` | `myportfolio-lvn8.onrender.com` |
| CNAME ou A | `@` (racine) | selon les instructions Render |

Attendez la propagation DNS (quelques minutes à 48 h). Render émet ensuite un certificat HTTPS gratuit (Let’s Encrypt).

### D. Mettre à jour Laravel

Dans Render → **Environment** :

| Variable | Nouvelle valeur |
|----------|-----------------|
| `APP_URL` | `https://narcisseogoudikpe.com` |

Puis **Save** → **Manual Deploy** (ou redémarrage).

Le sitemap et les balises canonical suivront automatiquement `APP_URL`.

## Être trouvé sur Google (SEO)

Le code inclut déjà : titres/meta, Open Graph, sitemap, `robots.txt`, schema Person (JSON-LD).

Ensuite, côté Google :

1. [Google Search Console](https://search.google.com/search-console) → **Ajouter une propriété** → votre domaine (ou l’URL).
2. Vérifiez la propriété (DNS TXT ou balise HTML).
3. **Sitemaps** → soumettez `https://votredomaine.com/sitemap.xml`.
4. Demandez l’indexation de la page d’accueil (Inspection d’URL → **Demander une indexation**).

Astuces pour apparaître sur « Narcisse OGOUDIKPE » :

- Gardez votre **nom complet** dans le titre et le H1 (déjà le cas).
- Liez le site depuis GitHub, LinkedIn, Facebook (lien « Portfolio » / site web).
- Publiez / mettez à jour le profil LinkedIn avec la même orthographe du nom.
- L’indexation n’est **pas instantanée** (souvent quelques jours).

## Dépannage

| Problème | Solution |
|----------|----------|
| Erreur 500 | Vérifier `APP_KEY`, logs dans l’onglet **Logs** Render |
| CSS/JS cassés | `APP_URL` doit être l’URL HTTPS Render exacte |
| Contact ne part pas | Vérifier toutes les variables `MAIL_*` |
| Build échoue | Vérifier que `composer.lock` est sur GitHub |
| `composer:2-php8.2: not found` | Tag Docker inexistant — le Dockerfile utilise `php:8.2-cli-alpine` + Composer installé manuellement |
| `php version does not satisfy` | Le build doit tourner avec PHP 8.2 (étape `vendor` du Dockerfile) |
| Build échoue sur `docker-php-ext-install` | Ne pas installer `fileinfo` (déjà inclus) ; le Dockerfile utilise `$PHPIZE_DEPS` |
| Build échoue sur `package:discover` | Normal au build sans `.env` — exécuté au démarrage dans `docker/start.sh` |

## Commandes utiles en local

```bash
php artisan key:generate --show
php artisan config:clear
```
