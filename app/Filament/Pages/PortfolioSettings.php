<?php

namespace App\Filament\Pages;

use App\Filament\PortfolioLink;
use App\Models\PortfolioSetting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class PortfolioSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Réglages';

    protected static ?string $title = 'Réglages de contact';

    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.portfolio-settings';

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    public function mount(): void
    {
        $settings = PortfolioSetting::query()->first();

        $this->form->fill([
            'phone_bj' => $settings?->phone_bj ?: config('portfolio.phone_bj.display'),
            'phone_bf' => $settings?->phone_bf ?: config('portfolio.phone_bf.display'),
            'address' => $settings?->address ?: config('portfolio.address'),
            'whatsapp' => $settings?->whatsapp ?: config('portfolio.whatsapp.display'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('phone_bj')
                    ->label('Téléphone Bénin')
                    ->required()
                    ->maxLength(40)
                    ->helperText('Affiché dans les coordonnées, le pied de page et le CV.'),
                Forms\Components\TextInput::make('phone_bf')
                    ->label('Téléphone Burkina Faso')
                    ->required()
                    ->maxLength(40)
                    ->helperText('Second numéro affiché sur le site.'),
                Forms\Components\TextInput::make('whatsapp')
                    ->label('WhatsApp')
                    ->required()
                    ->maxLength(40)
                    ->helperText('Numéro utilisé pour le bouton WhatsApp (lien wa.me calculé automatiquement).'),
                Forms\Components\TextInput::make('address')
                    ->label('Adresse affichée')
                    ->required()
                    ->maxLength(80)
                    ->helperText('Texte sous « Adresse » (ex. Bénin). Identique en français et en anglais.'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = PortfolioSetting::query()->first() ?? new PortfolioSetting;
        $settings->fill($data);
        $settings->save();

        PortfolioLink::saved('Réglages enregistrés')->send();
    }
}
