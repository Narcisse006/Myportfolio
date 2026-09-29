<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LatestContacts;
use App\Filament\Widgets\RecentProjects;
use App\Filament\Widgets\StatsOverview;
use App\Models\Contact;
use App\Models\Project;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Contracts\View\View;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Tableau de bord';

    protected static ?string $title = 'Portfolio Admin';

    public function getHeader(): ?View
    {
        return view('filament.dashboard-header', [
            'publishedCount' => Project::query()->where('is_published', true)->count(),
            'unreadCount' => Contact::query()->whereNull('read_at')->count(),
        ]);
    }

    public function getWidgets(): array
    {
        return [
            StatsOverview::class,
            LatestContacts::class,
            RecentProjects::class,
        ];
    }
}
