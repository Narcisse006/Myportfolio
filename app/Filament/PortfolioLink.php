<?php

namespace App\Filament;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class PortfolioLink
{
    public static function url(): string
    {
        return route('home');
    }

    public static function saved(string $title): Notification
    {
        return Notification::make()
            ->success()
            ->title($title)
            ->actions([
                Action::make('viewPortfolio')
                    ->label('Voir le portfolio')
                    ->url(self::url(), shouldOpenInNewTab: true),
            ]);
    }
}
