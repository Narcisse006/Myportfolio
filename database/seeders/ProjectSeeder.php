<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'TimeLux',
				'description' => 'Site de montres haut de gamme, avec fiches produit et navigation. Réalisé en HTML et CSS.',
                'tech_stack' => ['HTML5', 'CSS3'],
                'github_url' => $this->github('timelux', 'https://github.com/Narcisse006/Projet_perso_site'),
                'order' => 1,
                'status' => 'archived',
            ],
            [
                'title' => 'Forum Dev',
				'description' => 'Un espace où les développeurs publient et se répondent. Chacun a un compte, et l’accès passe par une authentification.',
                'tech_stack' => ['PHP POO', 'MySQL'],
                'github_url' => $this->github('forum', 'https://github.com/Narcisse006/forum'),
                'order' => 2,
                'status' => 'in_progress',
            ],
            [
                'title' => 'Gestion de stock',
				'description' => 'La caisse, le catalogue et le stock sont dans la même application. Une vente met les quantités à jour tout de suite.',
                'tech_stack' => ['Laravel', 'Bootstrap', 'MySQL'],
                'github_url' => $this->github('stock', 'https://github.com/Narcisse006/ProjetGestionDeStock'),
                'order' => 3,
                'status' => 'testing',
            ],
            [
                'title' => 'Suivi de colis',
				'description' => 'Suivi des colis pour une société de transport. Le statut de chaque envoi se lit sur un tableau de bord, et se met à jour depuis l’admin.',
                'tech_stack' => ['Laravel', 'AdminLTE', 'Bootstrap'],
                'github_url' => $this->github('colis', 'https://github.com/Narcisse006/Projet_suivi_colis'),
                'order' => 4,
                'status' => 'in_progress',
            ],
            [
                'title' => 'Scolaris',
                'description' => 'Les élèves, les notes et les comptes sont dans la même application. L’API Laravel et l’interface sont séparées.',
                'tech_stack' => ['Laravel', 'API REST'],
                'github_url' => 'https://github.com/Narcisse006/Scolaris',
                'order' => 5,
                'status' => 'in_progress',
            ],
            [
                'title' => 'Gestion Présence',
                'description' => 'Les présences des employés se suivent dans une application Laravel. Le tableau de bord les affiche après connexion.',
                'tech_stack' => ['Laravel'],
                'github_url' => 'https://github.com/Narcisse006/Gestion_Presence',
                'order' => 6,
                'status' => 'in_progress',
            ],
            [
                'title' => 'Scanner Multi-Fonctions',
                'description' => 'Application Python. Elle liste les réseaux Wi-Fi, et lit un QR code ou un code-barres avec la webcam.',
                'tech_stack' => ['Python', 'OpenCV'],
                'github_url' => 'https://github.com/Narcisse006/Scanner-Multi-Fonctions',
                'order' => 7,
                'status' => 'in_progress',
            ],
        ];

        foreach ($projects as $project) {
            $exists = Project::query()->where('title', $project['title'])->exists();
            $values = $project;

            if (! $exists) {
                $values['is_published'] = true;
            }

            Project::query()->updateOrCreate(
                ['title' => $project['title']],
                $values,
            );
        }
    }

    private function github(string $key, string $fallback): string
    {
        $url = config("portfolio.projects.$key");

        if (is_string($url) && $url !== '' && ! str_ends_with(rtrim($url, '/'), 'Narcisse006')) {
            return $url;
        }

        return $fallback;
    }
}
