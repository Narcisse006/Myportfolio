<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Projets';

    protected static ?string $modelLabel = 'projet';

    protected static ?string $pluralModelLabel = 'projets';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->label('Ordre')
                    ->numeric()
                    ->default(0)
                    ->required()
                    ->minValue(0),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),
                Forms\Components\TagsInput::make('tech_stack')
                    ->label('Technologies')
                    ->placeholder('Ajouter une techno')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->label('Image de couverture')
                    ->image()
                    ->disk('public')
                    ->directory('projects')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->helperText('Affichée sur la carte. Un clic ouvre la lightbox des captures.')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('gallery')
                    ->label('Captures du site')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->disk('public')
                    ->directory('projects/gallery')
                    ->visibility('public')
                    ->maxSize(2048)
                    ->maxFiles(12)
                    ->helperText('Galerie lightbox (jusqu’à 12 images). La couverture est ajoutée en premier si besoin.')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('url')
                    ->label('Site déployé')
                    ->url()
                    ->nullable()
                    ->maxLength(255)
                    ->helperText('Lien public du site en ligne (bouton « Voir le site »).'),
                Forms\Components\TextInput::make('github_url')
                    ->label('URL GitHub')
                    ->url()
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Statut')
                    ->options(Project::STATUSES)
                    ->default('in_progress')
                    ->required()
                    ->native(false),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publié')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tech_stack')
                    ->label('Technologies')
                    ->badge()
                    ->separator(','),
                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => Project::STATUSES[$state] ?? 'En cours')
                    ->color(fn (?string $state): string => match ($state) {
                        'online' => 'success',
                        'testing' => 'info',
                        'archived' => 'gray',
                        default => 'warning',
                    }),
                Tables\Columns\TextColumn::make('is_published')
                    ->label('Publié')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Publié' : 'Masqué')
                    ->color(fn (bool $state): string => $state ? 'success' : 'gray'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Publication')
                    ->trueLabel('Publiés')
                    ->falseLabel('Non publiés'),
                Tables\Filters\SelectFilter::make('status')
                    ->label('Statut')
                    ->options(Project::STATUSES),
            ])
            ->actions([
                Tables\Actions\Action::make('togglePublished')
                    ->label(fn (Project $record): string => $record->is_published ? 'Masquer' : 'Publier')
                    ->icon(fn (Project $record): string => $record->is_published ? 'heroicon-o-eye-slash' : 'heroicon-o-eye')
                    ->action(function (Project $record): void {
                        $record->update([
                            'is_published' => ! $record->is_published,
                        ]);

                        Notification::make()
                            ->title($record->is_published ? 'Projet publié' : 'Projet masqué')
                            ->success()
                            ->send();
                    }),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
