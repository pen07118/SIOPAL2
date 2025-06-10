<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeadphoneResource\Pages;
use App\Filament\Resources\HeadphoneResource\RelationManagers;
use App\Models\Headphone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeadphoneResource extends Resource
{
    protected static ?string $navigationGroup = 'Peripheral Master Data';
    protected static ?int $navigationSort = 4;
    protected static ?string $slug = 'headphone';
    protected static ?string $modelLabel = 'Headphone';
    protected static ?string $model = Headphone::class;
    protected static ?string $navigationIcon = 'mdi-headphones';

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
                    ->action(function (Headphone $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Headphone')
                    ->modalSubheading('Are you sure you want to delete this headphone?')
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
            'index' => Pages\ListHeadphones::route('/'),
            'create' => Pages\CreateHeadphone::route('/create'),
            'edit' => Pages\EditHeadphone::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Headphone'; // Label untuk model ini
    }

    public static function getPluralModelLabel(): string
    {
        return 'Headphone'; // Tetap 'Headphone' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Headphone'; // Ini untuk label di menu sidebar
    }
}
