<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VGAResource\Pages;
use App\Filament\Resources\VGAResource\RelationManagers;
use App\Models\VGA;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;


class VGAResource extends Resource
{
    protected static ?string $navigationGroup = 'Hardware Master Data';
    protected static ?int $navigationSort = 4;
    protected static ?string $model = VGA::class;
    protected static ?string $navigationIcon = 'bi-gpu-card';
    protected static ?string $slug = 'vga';
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
                TextInput::make('memory')
                    ->required()
                    ->suffix('GB')
                    ->label('Memory'),
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
                Tables\Columns\TextColumn::make('memory')
                    ->sortable()
                    ->searchable()
                    ->suffix(' GB')
                    ->label('Memory'),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable()
                    ->label('Stock'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->action(function (VGA $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete VGA')
                    ->modalSubheading('Are you sure you want to delete this VGA?')
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
            'index' => Pages\ListVGAS::route('/'),
            'create' => Pages\CreateVGA::route('/create'),
            'edit' => Pages\EditVGA::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'VGA';
    }

    public static function getPluralModelLabel(): string
    {
        return 'VGA'; // Tetap 'VGA' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'VGA'; // Ini untuk label di menu sidebar
    }
}
