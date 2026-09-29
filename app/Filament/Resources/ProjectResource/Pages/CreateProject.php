<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\PortfolioLink;
use App\Filament\Resources\ProjectResource;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('viewPortfolio')
                ->label('Voir le portfolio')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->url(PortfolioLink::url())
                ->openUrlInNewTab(),
        ];
    }

    protected function getCreatedNotification(): ?Notification
    {
        return PortfolioLink::saved('Projet créé');
    }
}
