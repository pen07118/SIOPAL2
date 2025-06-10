<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PSUResource\Pages;
use App\Filament\Resources\PSUResource\RelationManagers;
use App\Models\PSU;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PSUResource extends Resource
{
    protected static ?string $navigationGroup = 'Hardware Master Data';
    protected static ?int $navigationSort = 7;
    protected static ?string $model = PSU::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'psu';
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
                Forms\Components\TextInput::make('spec')
                    ->required()
                    ->label('Spec'),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->label('Year'),
                Forms\Components\TextInput::make('stock')
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
                Tables\Columns\TextColumn::make('spec')
                    ->sortable()
                    ->searchable()
                    ->label('Spec'),
                Tables\Columns\TextColumn::make('year')
                    ->sortable()
                    ->searchable()
                    ->label('Year'),
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
                    ->action(function (PSU $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Power Supply')
                    ->modalSubheading('Are you sure you want to delete this power supply?')
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
            'index' => Pages\ListPSUS::route('/'),
            'create' => Pages\CreatePSU::route('/create'),
            'edit' => Pages\EditPSU::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Power Supply';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Power Supply'; // Tetap 'PSU' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Power Supply'; // Ini untuk label di menu sidebar
    }
}
