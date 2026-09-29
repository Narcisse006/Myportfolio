<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\PortfolioLink;
use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('viewPortfolio')
                ->label('Voir le portfolio')
                ->icon('heroicon-o-arrow-top-right-on-square')
                ->url(PortfolioLink::url())
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return PortfolioLink::saved('Projet mis à jour');
    }
}
