<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MonitorResource\Pages;
use App\Filament\Resources\MonitorResource\RelationManagers;
use App\Models\Monitor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MonitorResource extends Resource
{
    protected static ?string $navigationGroup = 'Peripheral Master Data';
    protected static ?int $navigationSort = 1;
    protected static ?string $model = Monitor::class;
    protected static ?string $slug = 'monitor';
    protected static ?string $navigationIcon = 'mdi-monitor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                ->required()
                ->label('Brand'),
                Forms\Components\TextInput::make('size')
                ->required()
                ->suffix('inch')
                ->label('Size'),
                Forms\Components\TextInput::make('length')
                ->numeric()
                ->required()
                // ->dehydrated(false)
                ->label('Length - Resolution (px)'),
                Forms\Components\TextInput::make('width')
                ->numeric()
                ->required()
                // ->dehydrated(false)
                ->label('Width - Resolusion (px)'),
                Forms\Components\TextInput::make('spec')
                ->required()
                ->label('Spec'),
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
                Tables\Columns\TextColumn::make('size')
                    ->sortable()
                    ->searchable()
                    ->label('Size'),
                Tables\Columns\TextColumn::make('resolution')
                    ->label('Resolution')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('length')
                //     ->sortable()
                //     ->searchable()
                //     ->label('Length - Resolution'),
                // Tables\Columns\TextColumn::make('width')
                //     ->sortable()
                //     ->searchable()
                //     ->label('Width - Resolution'),
                Tables\Columns\TextColumn::make('spec')
                    ->sortable()
                    ->searchable()
                    ->label('Spec'),
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
                    ->action(function (Monitor $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Monitor')
                    ->modalSubheading('Are you sure you want to delete this monitor?')
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
            'index' => Pages\ListMonitors::route('/'),
            'create' => Pages\CreateMonitor::route('/create'),
            'edit' => Pages\EditMonitor::route('/{record}/edit'),
        ];
    }
    public static function getModelLabel(): string
    {
        return 'Monitor'; // Ini untuk label di halaman resource
    }

    public static function getPluralModelLabel(): string
    {
        return 'Monitor'; // Tetap 'Monitor' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Monitor'; // Ini untuk label di menu sidebar
    }
}
