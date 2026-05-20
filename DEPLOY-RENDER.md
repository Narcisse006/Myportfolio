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

### Email (formulaire de contact)

Sans SMTP, le contact **ne enverra pas** d’e-mails. Exemple avec **Brevo** (gratuit) ou Gmail :

| Variable | Exemple |
|----------|---------|
| `MAIL_MAILER` | `smtp` |
| `MAIL_HOST` | `smtp-relay.brevo.com` |
| `MAIL_PORT` | `587` |
| `MAIL_USERNAME` | votre login SMTP |
| `MAIL_PASSWORD` | clé SMTP (secret) |
| `MAIL_ENCRYPTION` | `tls` |
| `MAIL_FROM_ADDRESS` | `ogoudikpenarcisse@gmail.com` |
| `MAIL_FROM_NAME` | `Narcisse Portfolio` |

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

## Domaine personnalisé (optionnel)

Render → votre service → **Settings** → **Custom Domains** → suivez les instructions DNS.

## Dépannage

| Problème | Solution |
|----------|----------|
| Erreur 500 | Vérifier `APP_KEY`, logs dans l’onglet **Logs** Render |
| CSS/JS cassés | `APP_URL` doit être l’URL HTTPS Render exacte |
| Contact ne part pas | Vérifier toutes les variables `MAIL_*` |
| Build échoue | Vérifier que `composer.lock` est bien sur GitHub |

## Commandes utiles en local

```bash
php artisan key:generate --show
php artisan config:clear
```
