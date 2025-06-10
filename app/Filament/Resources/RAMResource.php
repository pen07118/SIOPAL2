<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RAMResource\Pages;
use App\Filament\Resources\RAMResource\RelationManagers;
use App\Models\RAM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RAMResource extends Resource
{
    protected static ?string $navigationGroup = 'Hardware Master Data';
    protected static ?int $navigationSort = 3;
    protected static ?string $model = RAM::class;
    protected static ?string $navigationIcon = 'bi-memory';
    protected static ?string $slug = 'ram';
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
                Forms\Components\TextInput::make('socket')
                    ->required()
                    ->label('Socket'),
                Forms\Components\TextInput::make('capacity')
                    ->required()
                    ->suffix('GB')
                    ->label('Capacity'),
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
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->searchable()
                    ->label('Type'),
                Tables\Columns\TextColumn::make('socket')
                    ->sortable()
                    ->searchable()
                    ->label('Socket'),
                Tables\Columns\TextColumn::make('capacity')
                    ->sortable()
                    ->searchable()
                    ->label('Capacity'),
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
                    ->action(function (RAM $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete RAM')
                    ->modalSubheading('Are you sure you want to delete this RAM?')
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
            'index' => Pages\ListRAMS::route('/'),
            'create' => Pages\CreateRAM::route('/create'),
            'edit' => Pages\EditRAM::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'RAM';
    }

    public static function getPluralModelLabel(): string
    {
        return 'RAM'; // Tetap 'RAM' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'RAM'; // Ini untuk label di menu sidebar
    }
}
