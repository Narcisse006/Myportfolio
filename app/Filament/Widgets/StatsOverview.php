<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $published = Project::query()->where('is_published', true)->count();
        $publishedThisMonth = Project::query()
            ->where('is_published', true)
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();

        $messages = Contact::query()->count();
        $messagesThisMonth = Contact::query()
            ->where('created_at', '>=', now()->startOfMonth())
            ->count();

        $unread = Contact::query()->whereNull('read_at')->count();

        $lastLogin = auth()->user()?->last_login_at;

        return [
            Stat::make('Projets publiés', $published)
                ->description($publishedThisMonth > 0 ? $publishedThisMonth.' ce mois' : 'Aucun nouveau ce mois')
                ->descriptionIcon($publishedThisMonth > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-minus')
                ->descriptionColor($publishedThisMonth > 0 ? 'success' : 'gray')
                ->color('success')
                ->icon('heroicon-o-briefcase')
                ->chart($this->sparkline(Project::class, onlyPublished: true))
                ->chartColor('success'),
            Stat::make('Messages reçus', $messages)
                ->description($messagesThisMonth > 0 ? $messagesThisMonth.' ce mois' : 'Aucun nouveau ce mois')
                ->descriptionIcon($messagesThisMonth > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-minus')
                ->descriptionColor($messagesThisMonth > 0 ? 'info' : 'gray')
                ->color('info')
                ->icon('heroicon-o-envelope')
                ->chart($this->sparkline(Contact::class))
                ->chartColor('info'),
            Stat::make('Messages non lus', $unread)
                ->description($unread > 0 ? 'À traiter' : 'Boîte à jour')
                ->descriptionIcon($unread > 0 ? 'heroicon-m-exclamation-circle' : 'heroicon-m-check')
                ->descriptionColor($unread > 0 ? 'warning' : 'success')
                ->color('warning')
                ->icon('heroicon-o-bell'),
            Stat::make('Dernière connexion', $lastLogin ? $lastLogin->diffForHumans() : '—')
                ->description($lastLogin ? $lastLogin->format('d/m/Y H:i') : 'Aucune connexion enregistrée')
                ->descriptionIcon('heroicon-m-clock')
                ->color('purple')
                ->icon('heroicon-o-clock'),
        ];
    }

    /**
     * @param  class-string<Project|Contact>  $model
     * @return array<int, int>
     */
    private function sparkline(string $model, bool $onlyPublished = false): array
    {
        $points = [];

        for ($day = 6; $day >= 0; $day--) {
            $query = $model::query()->whereDate('created_at', now()->subDays($day)->toDateString());

            if ($onlyPublished) {
                $query->where('is_published', true);
            }

            $points[] = $query->count();
        }

        return $points;
    }
}
