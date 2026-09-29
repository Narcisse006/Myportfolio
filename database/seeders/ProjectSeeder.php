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
                'description' => 'Site e-commerce vitrine pour montres haut de gamme, design soigné et navigation fluide.',
                'tech_stack' => ['HTML5', 'CSS3'],
                'github_url' => $this->github('timelux', 'https://github.com/Narcisse006/Projet_perso_site'),
                'order' => 1,
            ],
            [
                'title' => 'Forum Dev',
                'description' => 'Plateforme d’échange entre développeurs : publications, réponses et espace communautaire.',
                'tech_stack' => ['PHP POO', 'MySQL'],
                'github_url' => $this->github('forum', 'https://github.com/Narcisse006/forum'),
                'order' => 2,
            ],
            [
                'title' => 'Gestion de stock',
                'description' => 'Application métier avec caisse intégrée, gestion des produits et suivi des ventes.',
                'tech_stack' => ['Laravel', 'Bootstrap', 'MySQL'],
                'github_url' => $this->github('stock', 'https://github.com/Narcisse006/ProjetGestionDeStock'),
                'order' => 3,
            ],
            [
                'title' => 'Suivi de colis',
                'description' => 'Système de tracking pour transporteur : statuts, tableau de bord et interface admin.',
                'tech_stack' => ['Laravel', 'AdminLTE', 'Bootstrap'],
                'github_url' => $this->github('colis', 'https://github.com/Narcisse006/Projet_suivi_colis'),
                'order' => 4,
            ],
        ];

        foreach ($projects as $project) {
            Project::query()->firstOrCreate(
                ['title' => $project['title']],
                [
                    ...$project,
                    'is_published' => true,
                ],
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
