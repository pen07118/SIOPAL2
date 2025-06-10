<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DVDResource\Pages;
use App\Filament\Resources\DVDResource\RelationManagers;
use App\Models\DVD;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DVDResource extends Resource
{
    protected static ?string $navigationGroup = 'Hardware Master Data';
    protected static ?int $navigationSort = 6;
    protected static ?string $model = DVD::class;
    // protected static ?string $navigationIcon = 'mdi-power-plug-battery-outline';
    protected static ?string $navigationIcon = 'hugeicons-cd';
    protected static ?string $slug = 'dvd';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->label('Brand'),
                Forms\Components\TextInput::make('spec')
                    ->required()
                    ->label('Spec'),
                Forms\Components\TextInput::make('stock')
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
                Tables\Columns\TextColumn::make('spec')
                    ->sortable()
                    ->searchable()
                    ->label('Spec'),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable()
                    ->label('Stock'),
            ])->filters([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->action(function (DVD $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete DVD')
                    ->modalSubheading('Are you sure you want to delete this DVD?')
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
            'index' => Pages\ListDVDS::route('/'),
            'create' => Pages\CreateDVD::route('/create'),
            'edit' => Pages\EditDVD::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'DVD'; // Label untuk model ini
    }

    public static function getPluralModelLabel(): string
    {
        return 'DVD'; // Tetap 'Storage' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'DVD'; // Ini untuk label di menu sidebar
    }
}
