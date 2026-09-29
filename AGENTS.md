# Règles de travail

Ces règles s’appliquent à chaque tâche sur ce dépôt. La documentation dans `docs/` décrit l’état actuel du code. Elle se met à jour avec le code.

Le site public et l’admin Filament sont deux fronts. Le détail est dans `docs/architecture.md`.

## Avant de coder

1. Reformuler la demande et le résultat visible attendu.
2. Lire le code existant qui s’en approche, pas seulement le fichier nommé dans la demande.
3. Chercher une fonctionnalité semblable dans `docs/features.md` et dans `app/`, `resources/views/`, `app/Filament/`.
4. Chercher un morceau réutilisable dans `docs/components.md` avant d’en créer un.
5. Lire la page de `docs/` concernée (`architecture`, `database`, `authentication`, `development`, `decisions`).
6. Lister les fichiers réellement touchés.
7. Pour un changement qui traverse plusieurs fichiers ou le schéma, écrire le plan avant d’éditer.

## Pendant le développement

- Réutiliser `ContactRequest`, `ContactMail`, `PortfolioLink`, les partials `seo`, `favicon` et `custom-cursor`, et les ressources Filament existantes quand ils couvrent le besoin.
- Ne pas ajouter de dossier `app/Services` ou de policy pour une règle qui tient dans le contrôleur, le Form Request ou la ressource Filament déjà en place.
- Ne pas modifier un fichier sans lien avec la demande.
- Le site public se style dans `public/css/style.css` et se comporte dans `public/js/main.js`. Ne pas brancher Tailwind ou Vite sur `index.blade.php` ou `cv.blade.php` pour un correctif local.
- Les textes admin et les erreurs du formulaire restent en français.
- Un texte public nouveau a sa chaîne française dans le Blade et sa clé dans `translations` de `public/js/main.js` s’il porte `data-i18n`.
- Le mot de passe utilisateur passe par le cast `hashed` de `User`. Ne pas hasher une seconde fois.
- Ne pas committer `.env`.
- Ne pas ajouter de dépendance Composer ou npm sans un usage concret dans le code de la tâche.
- Le contrôleur public s’appelle `indexController`. Ne pas le renommer au passage.

## Après le développement

- Relire le diff et supprimer le code mort ou dupliqué introduit par la tâche.
- Lancer `php artisan test` si le comportement PHP, une vue rendue ou une migration a changé.
- Vérifier les pages qui partagent le même modèle ou la même vue : accueil et admin pour un projet, formulaire et boîte Messages pour un contact.
- Mettre à jour la doc devenue fausse. Ne pas créer un second document sur le même sujet.
- `docs/features.md` si une fonctionnalité est ajoutée, retirée ou si son flux change.
- `docs/components.md` si un partial, un widget, une classe utilitaire ou un script partagé est ajouté ou n’a plus le même rôle.
- `docs/database.md` si une table, une colonne ou une relation change.
- `docs/authentication.md` si le login, le profil ou l’accès au panneau change.
- `docs/decisions.md` si le choix engage l’architecture (nouveau front, moteur de base, hébergement, auth).
- `docs/changelog.md` pour une évolution visible. Pas pour un correctif de typo ou un détail de build.
- `docs/architecture.md` et `README.md` si une route, un dossier important ou la stack change.
- La doc décrit le code présent dans le dépôt, pas une intention.

## Déploiement

Render déploie `main`. Un correctif de production passe par une branche et une pull request. `Dockerfile` et `docker/start.sh` doivent rester alignés avec la version PHP du `composer.lock`.
