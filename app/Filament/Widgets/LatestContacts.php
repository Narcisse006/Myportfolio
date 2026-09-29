<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestContacts extends BaseWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = [
        'default' => 'full',
        'lg' => 1,
    ];

    public function table(Table $table): Table
    {
        return $table
            ->heading('Derniers messages')
            ->description('Les 5 messages les plus récents')
            ->query(Contact::query()->latest()->limit(5))
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom'),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Sujet')
                    ->limit(28),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y'),
                Tables\Columns\TextColumn::make('read_at')
                    ->label('Statut')
                    ->badge()
                    ->formatStateUsing(fn ($state): string => $state ? 'Lu' : 'Non lu')
                    ->color(fn ($state): string => $state ? 'success' : 'warning'),
            ])
            ->emptyStateHeading('Aucun message')
            ->emptyStateDescription('Les messages du formulaire apparaîtront ici.')
            ->emptyStateIcon('heroicon-o-envelope');
    }
}
