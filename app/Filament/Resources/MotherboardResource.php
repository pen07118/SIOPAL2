<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MotherboardResource\Pages;
use App\Filament\Resources\MotherboardResource\RelationManagers;
use App\Models\Motherboard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MotherboardResource extends Resource
{

    protected static ?string $navigationGroup = 'Hardware Master Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $model = Motherboard::class;
    protected static ?string $slug = 'motherboard';
    protected static ?string $navigationIcon = 'bi-motherboard';
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
                Forms\Components\TextInput::make('proc_socket')
                    ->required()
                    ->label('Processor Socket'),
                Forms\Components\TextInput::make('ram_socket')
                    ->required()
                    ->label('RAM Socket'),
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
                Tables\Columns\TextColumn::make('spec')
                    ->sortable()
                    ->searchable()
                    ->label('Spec'),
                Tables\Columns\TextColumn::make('proc_socket')
                    ->sortable()
                    ->searchable()
                    ->label('Processor Socket'),
                Tables\Columns\TextColumn::make('ram_socket')
                    ->sortable()
                    ->searchable()
                    ->label('RAM Socket'),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable()
                    ->label('Stock'),
            ])->filters([
                //
            ])->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])->actions([
                //
            ])->bulkActions([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->action(function (Motherboard $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Motherboard')
                    ->modalSubheading('Are you sure you want to delete this motherboard?')
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
            'index' => Pages\ListMotherboards::route('/'),
            'create' => Pages\CreateMotherboard::route('/create'),
            'edit' => Pages\EditMotherboard::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Motherboard';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Motherboard'; // Tetap 'Motherboard' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Motherboard'; // Ini untuk label di menu sidebar
    }
}
