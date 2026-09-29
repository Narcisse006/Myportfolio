<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentProjects extends BaseWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = [
        'default' => 'full',
        'lg' => 1,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->heading('Projets récents')
            ->description('Les 5 derniers projets')
            ->query(Project::query()->latest()->limit(5))
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre'),
                Tables\Columns\TextColumn::make('tech_stack')
                    ->label('Technologies')
                    ->badge()
                    ->separator(','),
                Tables\Columns\TextColumn::make('is_published')
                    ->label('Publié')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Publié' : 'Masqué')
                    ->color(fn (bool $state): string => $state ? 'success' : 'gray'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordre'),
            ])
            ->emptyStateHeading('Aucun projet')
            ->emptyStateDescription('Ajoute un projet pour le voir ici.')
            ->emptyStateIcon('heroicon-o-briefcase');
    }
}
