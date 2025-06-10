<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcessorResource\Pages;
use App\Filament\Resources\ProcessorResource\RelationManagers;
use App\Models\Processor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcessorResource extends Resource
{
    protected static ?string $navigationGroup = 'Hardware Master Data';
    protected static ?int $navigationSort = 2;
    protected static ?string $model = Processor::class;
    protected static ?string $slug = 'processor';
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
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
                    ->label('Specification'),
                Forms\Components\TextInput::make('socket')
                    ->required()
                    ->label('Socket'),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->label('Year'),
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
                    ->label('Specification'),
                Tables\Columns\TextColumn::make('socket')
                    ->sortable()
                    ->searchable()
                    ->label('Socket'),
                Tables\Columns\TextColumn::make('year')
                    ->sortable()
                    ->searchable()
                    ->label('Year'),
                Tables\Columns\TextColumn::make('stock')
                    ->sortable()
                    ->label('Stock'),
            ])->filters([
                //
            ])->headerActions([
                // Tables\Actions\CreateAction::make(),
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
                    ->action(function (Processor $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Processor')
                    ->modalSubheading('Are you sure you want to delete this processor?')
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
            'index' => Pages\ListProcessors::route('/'),
            'create' => Pages\CreateProcessor::route('/create'),
            'edit' => Pages\EditProcessor::route('/{record}/edit'),
        ];
    }
    
    public static function getModelLabel(): string
    {
        return 'Processor';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Processor'; // Tetap 'Processor' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Processor'; // Ini untuk label di menu sidebar
    }
}
