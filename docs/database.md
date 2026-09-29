# Base de données

Deux usages réels :

- En local, `.env.example` pointe vers MySQL, base `portfolio_narcisse`.
- Les tests utilisent SQLite en mémoire (`phpunit.xml`, `DB_DATABASE=:memory:`).
- Sur Render, aucune variable `DB_*` n’est définie dans `render.yaml`. `docker/start.sh` crée alors `database/database.sqlite` et lance les migrations. Ce fichier disparaît quand le conteneur est recréé. Les projets de démo reviennent grâce au seeder. Les messages et les images uploadées, non.

Les modèles du portfolio ne sont pas reliés entre eux. Il n’y a pas de clé étrangère entre `users`, `projects` et `contacts`.

## `projects`

Migration : `database/migrations/2026_09_29_100000_create_projects_table.php`.  
Modèle : `app/Models/Project.php`.

| Colonne | Rôle |
|---------|------|
| `id` | Clé primaire |
| `title` | Titre affiché sur le site et dans l’admin |
| `description` | Texte de la carte |
| `tech_stack` | JSON, liste de chaînes. Nullable. Le modèle le cast en tableau |
| `image` | Nullable. Chemin ou URL, voir l’accesseur `imageUrl` |
| `url` | Nullable. Lien du projet s’il n’y a pas de lien GitHub |
| `github_url` | Nullable. Lien préféré sur la carte |
| `order` | Entier, défaut 0. Tri de la page d’accueil |
| `is_published` | Booléen, défaut vrai. Faux = masqué sur le site |
| `created_at`, `updated_at` | Horodatage Laravel |

Règles :

- Seuls les projets `is_published` apparaissent sur `/`, triés par `order`.
- Le seeder `ProjectSeeder` fait un `firstOrCreate` sur le titre. Relancer le seed ne duplique pas TimeLux, Forum Dev, Gestion de stock et Suivi de colis. Changer le titre dans l’admin puis reseeder recrée l’ancien titre.
- La colonne s’appelle `order`. C’est un mot réservé SQL. Eloquent l’échappe. Dans une requête SQL écrite à la main, il faudra des guillemets adaptés au moteur.

## `contacts`

Migration : `database/migrations/2026_09_29_100001_create_contacts_table.php`.  
Modèle : `app/Models/Contact.php`.

| Colonne | Rôle |
|---------|------|
| `id` | Clé primaire |
| `name`, `email`, `subject`, `message` | Copie validée du formulaire |
| `read_at` | Nullable. Vide = non lu. Rempli par `markAsRead()` |
| `created_at`, `updated_at` | Horodatage Laravel |

`markAsRead()` n’écrit la date qu’une fois. Rappeler la méthode ne change pas `read_at`.

Le modèle n’a pas de colonne « répondu » ni de lien vers un utilisateur.

## `users`

Migrations :

- `database/migrations/0001_01_01_000000_create_users_table.php`
- `database/migrations/2026_09_29_100002_add_last_login_at_to_users_table.php`

Modèle : `app/Models/User.php`.

| Colonne | Rôle dans ce projet |
|---------|---------------------|
| `id` | Clé primaire |
| `name` | Nom affiché dans l’admin |
| `email` | Unique. Identifiant de connexion |
| `email_verified_at` | Présente, jamais utilisée par un écran du projet |
| `password` | Chaîne hashée. Le cast `hashed` chiffre à l’enregistrement |
| `remember_token` | Jeton « se souvenir de moi », géré par Laravel |
| `last_login_at` | Nullable. Écrite à chaque événement `Login` dans `AppServiceProvider` |
| `created_at`, `updated_at` | Horodatage Laravel |

`AdminUserSeeder` fait un `updateOrCreate` sur l’e-mail, avec `ADMIN_EMAIL`, `ADMIN_PASSWORD` et `ADMIN_NAME`. Si l’e-mail ou le mot de passe est vide, le seeder ne fait rien. Le mot de passe en clair dans `.env` est hashé par le cast du modèle.

`canAccessPanel()` retourne `true` pour n’importe quel utilisateur de cette table. Il n’y a pas de colonne rôle.

## Tables Laravel non utilisées par les écrans

Ces tables sont créées par les migrations d’origine du framework. Aucune fonctionnalité du portfolio ne les lit.

| Table | Migration | Pourquoi elle ne sert pas ici |
|-------|-----------|-------------------------------|
| `password_reset_tokens` | `0001_01_01_000000_create_users_table.php` | Pas d’écran « mot de passe oublié » |
| `sessions` | même fichier | `SESSION_DRIVER=file` en local et sur Render. La session est un fichier dans `storage/framework/sessions` |
| `cache`, `cache_locks` | `0001_01_01_000001_create_cache_table.php` | `CACHE_STORE=file` |
| `jobs`, `job_batches`, `failed_jobs` | `0001_01_01_000002_create_jobs_table.php` | `QUEUE_CONNECTION=sync`. L’e-mail de contact part pendant la requête, pas dans un worker |

## Seeders

`DatabaseSeeder` appelle dans l’ordre `AdminUserSeeder` puis `ProjectSeeder`.

`docker/start.sh` les relance à chaque démarrage du conteneur, après `migrate --force`.
