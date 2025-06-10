<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaboranResource\Pages;
use App\Filament\Resources\LaboranResource\RelationManagers;
use App\Models\Laboran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class LaboranResource extends Resource
{
    protected static ?string $navigationGroup = 'Data Management';
    protected static ?int $navigationSort = 1;
    protected static ?string $model = Laboran::class;
    protected static ?string $slug = 'laboran';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('npp')
                    ->label('NPP')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->label('Email Address')
                    ->required()
                    ->email(),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->password()
                    ->maxLength(255)
                    ->dehydrated(fn ($state) => !empty($state))
                    ->visibleOn('create'),
                Select::make('shift')
                    ->label('Shift')
                    ->options([
                        'Pagi' => 'Pagi',
                        'Siang' => 'Siang'
                    ])
                    ->required()
                    ->reactive(),
                    Select::make('lab_1')
                    ->label('Lab 1')
                    ->options(self::getLabOptions())
                    ->required()
                    ->reactive()
                    ->visible(fn ($get) => $get('shift') !== null),
                Select::make('lab_2')
                    ->label('Lab 2')
                    ->options(self::getLabOptions())
                    ->required(fn ($get) => $get('shift') === 'Siang')
                    ->visible(fn ($get) => $get('shift') === 'Siang'),
                Forms\Components\TextInput::make('no_telp')
                    ->label('No HP')
                    ->required(),
            ]);
    }

    private static function getLabOptions(): array
    {
        return [
            'D.2.A' => 'D.2.A',
            'D.2.B' => 'D.2.B',
            'D.2.C' => 'D.2.C',
            'D.2.D' => 'D.2.D',
            'D.2.E' => 'D.2.E',
            'D.2.F' => 'D.2.F',
            'D.2.G' => 'D.2.G',
            'D.2.H' => 'D.2.H',
            'D.2.I' => 'D.2.I',
            'D.2.J' => 'D.2.J',
            'D.2.K' => 'D.2.K',
            'D.2.L' => 'D.2.L',
            'D.2.M' => 'D.2.M',
            'D.2.N' => 'D.2.N',
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('npp')
                    ->label('NPP')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('lab')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('shift')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telp')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->action(function (Laboran $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Laboran')
                    ->modalSubheading('Are you sure you want to delete this laboran?')
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
            'index' => Pages\ListLaborans::route('/'),
            'create' => Pages\CreateLaboran::route('/create'),
            'edit' => Pages\EditLaboran::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Laboran';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Laboran'; // Tetap 'Laboran' walaupun ini bentuk plural
    }

    public static function getNavigationLabel(): string
    {
        return 'Laboran'; // Ini untuk label di menu sidebar
    }
}
