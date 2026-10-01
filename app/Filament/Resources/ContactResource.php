<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Messages';

    protected static ?string $modelLabel = 'message';

    protected static ?string $pluralModelLabel = 'messages';

    protected static ?int $navigationSort = 2;

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        $count = Contact::query()->whereNull('read_at')->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Sujet')
                    ->searchable()
                    ->limit(40),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('read_at')
                    ->label('Statut')
                    ->badge()
                    ->formatStateUsing(fn ($state): string => $state ? 'Lu' : 'Non lu')
                    ->color(fn ($state): string => $state ? 'success' : 'warning'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TernaryFilter::make('read')
                    ->label('Statut')
                    ->trueLabel('Lus')
                    ->falseLabel('Non lus')
                    ->queries(
                        true: fn (Builder $query) => $query->whereNotNull('read_at'),
                        false: fn (Builder $query) => $query->whereNull('read_at'),
                    ),
            ])
            ->actions([
                Tables\Actions\Action::make('viewMessage')
                    ->label('Voir le message')
                    ->icon('heroicon-o-eye')
                    ->modalHeading(fn (Contact $record): string => $record->subject)
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Fermer')
                    ->modalContent(fn (Contact $record) => view('filament.contacts.message', ['record' => $record]))
                    ->extraModalFooterActions([
                        Tables\Actions\Action::make('replyFromModal')
                            ->label('Répondre')
                            ->icon('heroicon-o-paper-airplane')
                            ->url(fn (Contact $record): string => $record->gmailReplyUrl())
                            ->openUrlInNewTab(),
                    ])
                    ->mountUsing(function (Contact $record): void {
                        $record->markAsRead();
                    }),
                Tables\Actions\Action::make('reply')
                    ->label('Répondre')
                    ->icon('heroicon-o-paper-airplane')
                    ->url(fn (Contact $record): string => $record->gmailReplyUrl())
                    ->openUrlInNewTab(),
                Tables\Actions\Action::make('markAsRead')
                    ->label('Marquer comme lu')
                    ->icon('heroicon-o-check')
                    ->visible(fn (Contact $record): bool => $record->read_at === null)
                    ->action(function (Contact $record): void {
                        $record->markAsRead();

                        Notification::make()
                            ->title('Message marqué comme lu')
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListContacts::route('/'),
        ];
    }
}
