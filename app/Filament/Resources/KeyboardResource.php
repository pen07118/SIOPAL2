<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeyboardResource\Pages;
use App\Filament\Resources\KeyboardResource\RelationManagers;
use App\Models\Keyboard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KeyboardResource extends Resource
{
    protected static ?string $navigationGroup = 'Peripheral Master Data';
    protected static ?int $navigationSort = 2;
    protected static ?string $slug = 'keyboard';
    protected static ?string $navigationLabel = 'Keyboard';
    protected static ?string $model = Keyboard::class;

    protected static ?string $navigationIcon = 'mdi-keyboard-outline';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->label('Brand'),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->label('Type'),
                Forms\Components\TextInput::make('stock')
                    ->numeric()
                    ->required()
                    ->label('Stock'),
            ])->columns([
                'sm' => 2,
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
                    ->action(function (Keyboard $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Keyboard')
                    ->modalSubheading('Are you sure you want to delete this keyboard?')
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
            'index' => Pages\ListKeyboards::route('/'),
            'create' => Pages\CreateKeyboard::route('/create'),
            'edit' => Pages\EditKeyboard::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Keyboard'; // Label untuk model ini
    }

    public static function getPluralModelLabel(): string
    {
        return 'Keyboard'; // Tetap 'Keyboard' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Keyboard'; // Ini untuk label di menu sidebar
    }
}
