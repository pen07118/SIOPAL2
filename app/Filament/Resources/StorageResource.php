<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StorageResource\Pages;
use App\Filament\Resources\StorageResource\RelationManagers;
use App\Models\Storage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;


class StorageResource extends Resource
{
    protected static ?string $navigationGroup = 'Hardware Master Data';
    protected static ?int $navigationSort = 5;
    protected static ?string $model = Storage::class;
    protected static ?string $slug = 'storage';
    protected static ?string $navigationIcon = 'bi-device-ssd';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('brand')
                    ->required()
                    ->label('Brand'),
                TextInput::make('type')
                    ->required()
                    ->label('Type'),
                TextInput::make('capacity')
                    ->required()
                    ->label('Capacity'),
                TextInput::make('spec')
                    ->required()
                    ->label('Specification'),
                TextInput::make('stock')
                    ->required()
                    ->label('Stock'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                    ->sortable()
                    ->searchable()
                    ->label('Brand'),
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable()
                    ->label('Type'),
                Tables\Columns\TextColumn::make('capacity')
                    ->sortable()
                    ->searchable()
                    ->label('Capacity'),
                Tables\Columns\TextColumn::make('spec')
                    ->sortable()
                    ->searchable()
                    ->label('Specification'),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable()
                    ->label('Stock'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->action(function (Storage $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Storage')
                    ->modalSubheading('Are you sure you want to delete this storage?')
                    ->modalButton('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStorages::route('/'),
            'create' => Pages\CreateStorage::route('/create'),
            'edit' => Pages\EditStorage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Storage'; // Label untuk model ini
    }

    public static function getPluralModelLabel(): string
    {
        return 'Storage'; // Tetap 'Storage' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Storage'; // Ini untuk label di menu sidebar
    }
}
