<?php

namespace App\Filament\Pages\Auth;

use App\Filament\PortfolioLink;
use Filament\Actions\Action;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Illuminate\Validation\Rules\Password;

class EditProfile extends BaseEditProfile
{
    protected static bool $isDiscovered = false;

    public static function getLabel(): string
    {
        return 'Mon profil';
    }

    public function getTitle(): string
    {
        return 'Mon profil';
    }

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

    protected function getSavedNotification(): ?Notification
    {
        return PortfolioLink::saved('Profil mis à jour');
    }

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
            ->label('Nom')
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Adresse e-mail')
            ->email()
            ->required()
            ->maxLength(255)
            ->unique(ignoreRecord: true);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Nouveau mot de passe')
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->rule(Password::default())
            ->autocomplete('new-password')
            ->dehydrated(fn ($state): bool => filled($state))
            ->live(debounce: 500)
            ->same('passwordConfirmation')
            ->helperText('Laisse ce champ vide pour conserver le mot de passe actuel.');
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->label('Confirmer le nouveau mot de passe')
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->visible(fn (Get $get): bool => filled($get('password')))
            ->dehydrated(false);
    }
}
