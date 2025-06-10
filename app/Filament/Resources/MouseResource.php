<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MouseResource\Pages;
use App\Filament\Resources\MouseResource\RelationManagers;
use App\Models\Mouse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MouseResource extends Resource
{
    protected static ?string $navigationGroup = 'Peripheral Master Data';
    protected static ?int $navigationSort = 3;
    protected static ?string $slug = 'mouse';
    protected static ?string $modelLabel = 'Mouse';
    protected static ?string $model = Mouse::class;
    protected static ?string $navigationIcon = 'mdi-mouse-outline';

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
                    ->action(function (Mouse $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Mouse')
                    ->modalSubheading('Are you sure you want to delete this mouse?')
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
            'index' => Pages\ListMouse::route('/'),
            'create' => Pages\CreateMouse::route('/create'),
            'edit' => Pages\EditMouse::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Mouse'; // Ini untuk label di sidebar dan breadcrumb
    }

    public static function getPluralModelLabel(): string
    {
        return 'Mouse'; // Tetap 'Processor' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Mouse'; // Ini untuk label di menu sidebar
    }
}
