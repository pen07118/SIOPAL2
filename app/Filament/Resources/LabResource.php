<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LabResource\Pages;
use App\Filament\Resources\LabResource\RelationManagers;
use App\Models\Lab;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LabResource extends Resource
{
    protected static ?string $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 2;
    protected static ?string $model = Lab::class;
    protected static ?string $slug = 'lab';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('lab_name')
                    ->required()
                    ->label('Laboratory'),
                Forms\Components\TextInput::make('floor')
                    ->required()
                    ->label('Floor Location'),
            ])->columns([
                'sm' => 2,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('lab_name')
                    ->sortable()
                    ->searchable()
                    ->label('Laboratory'),
                Tables\Columns\TextColumn::make('floor')
                    ->sortable()
                    ->searchable()
                    ->label('Floor Location'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListLabs::route('/'),
            'create' => Pages\CreateLab::route('/create'),
            'edit' => Pages\EditLab::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Laboratory'; // Ini untuk label di halaman resource
    }

    public static function getPluralModelLabel(): string
    {
        return 'Laboratory'; // Tetap 'Monitor' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Laboratory'; // Ini untuk label di menu sidebar
    }
}
