<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebcamResource\Pages;
use App\Filament\Resources\WebcamResource\RelationManagers;
use App\Models\Webcam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebcamResource extends Resource
{
    protected static ?string $navigationGroup = 'Peripheral Master Data';
    protected static ?int $navigationSort = 5;
    protected static ?string $model = Webcam::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                    ->action(function (Webcam $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Webcam')
                    ->modalSubheading('Are you sure you want to delete this webcam?')
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
            'index' => Pages\ListWebcams::route('/'),
            'create' => Pages\CreateWebcam::route('/create'),
            'edit' => Pages\EditWebcam::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Webcam';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Webcam'; // Tetap 'Webcam' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Webcam'; // Ini untuk label di menu sidebar
    }
}
