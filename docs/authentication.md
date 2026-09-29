# Authentification

Le site public n’a pas de comptes visiteurs. Il n’y a pas d’inscription, pas de rôles et pas de policies.

La seule connexion est celle de l’administration Filament.

## Connexion

1. Ouvrir `/admin/login`.
2. Saisir l’e-mail et le mot de passe d’une ligne de la table `users`.
3. Filament utilise le garde d’authentification par défaut de Laravel (`config/auth.php`, provider Eloquent sur `App\Models\User`).
4. La session est un fichier (`SESSION_DRIVER=file`), pas la table `sessions`.
5. `AppServiceProvider` écoute l’événement `Login` et remplit `users.last_login_at`.

Le compte initial vient de `AdminUserSeeder` :

- e-mail : `ADMIN_EMAIL`
- mot de passe : `ADMIN_PASSWORD`
- nom : `ADMIN_NAME`, ou « Narcisse OGOUDIKPE » si la variable est absente

Sur Render, ces trois variables ne sont pas dans `render.yaml`. Sans elles dans l’onglet Environment, le seeder ne crée personne et `/admin/login` n’a aucun compte. Le site public, lui, fonctionne quand même.

## Déconnexion

Le menu utilisateur de Filament fournit la déconnexion. Il n’y a pas de route de logout écrite dans `routes/web.php`.

## Qui peut entrer

`User::canAccessPanel()` retourne toujours `true`.

Toute ligne de `users` peut ouvrir le panneau. Il n’existe pas de rôle « admin » ou « éditeur ». Protéger l’admin, aujourd’hui, c’est n’avoir qu’un seul utilisateur et un mot de passe solide.

Le middleware qui bloque les pages `/admin` sans session est `Filament\Http\Middleware\Authenticate`, déclaré dans `AdminPanelProvider::authMiddleware()`.

## Profil

`/admin/profile` est la page `app/Filament/Pages/Auth/EditProfile.php`.

- Nom et e-mail sont obligatoires. L’e-mail reste unique.
- Le mot de passe est facultatif. Vide = on garde l’ancien.
- S’il est rempli, Filament exige la confirmation et la règle `Password::default()` de Laravel.
- Le champ est enregistré en clair dans le formulaire, puis le cast `hashed` du modèle le chiffre. Ne pas hasher avant.

## Ce qu’un visiteur ne peut pas faire

- Créer un compte.
- Réinitialiser un mot de passe (la table `password_reset_tokens` existe, aucun écran ne l’utilise).
- Voir `/admin` sans être connecté : Filament renvoie vers la page de login.

## Flux jusqu’à une fonctionnalité

Visiteur anonyme → `/admin/projects` → redirection login → e-mail + mot de passe → session → `canAccessPanel()` → `ProjectResource`.

Le site public (`/`, `/cv`, `/contact`) ne consulte pas cette session.
