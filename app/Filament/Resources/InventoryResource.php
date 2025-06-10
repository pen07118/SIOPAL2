<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Filament\Resources\InventoryResource\RelationManagers;
use App\Models\PCInventory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InventoryResource extends Resource
{
    protected static ?string $model = PCInventory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pc_name')
                ->required(),

                Forms\Components\Select::make('motherboard_id')
                ->relationship('motherboard', 'brand')
                ->required(),
                Forms\Components\Select::make('processor_id')
                ->relationship('processor', 'brand')
                ->required(),
                Forms\Components\Select::make('ram_id')
                ->relationship('ram', 'brand')
                ->required(),
                Forms\Components\Select::make('vga_id')
                ->relationship('vga', 'brand')
                ->required(),
                Forms\Components\Select::make('storage_id')
                ->relationship('storage', 'brand')
                ->required(),
                Forms\Components\Select::make('psu_id')
                ->relationship('psu', 'brand')
                ->required(),
                // Forms\Components\Select::make('case_id')
                // ->relationship('case', 'brand')
                // ->required(),
                Forms\Components\Select::make('monitor_id')
                ->relationship('monitor', 'brand')
                ->required(),
                Forms\Components\Select::make('keyboard_id')
                ->relationship('keyboard', 'brand')
                ->required(),
                Forms\Components\Select::make('mouse_id')
                ->relationship('mouse', 'brand')
                ->required(),
                Forms\Components\Select::make('webcam_id')
                ->relationship('webcam', 'brand')
                ->required(),
                Forms\Components\Select::make('headphone_id')
                ->relationship('headphone', 'brand')
                ->required(),
                Forms\Components\Select::make('dvd_id')
                ->relationship('dvd', 'brand')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pc_name')->searchable(),
                Tables\Columns\TextColumn::make('motherboard.brand'),
                Tables\Columns\TextColumn::make('processor.brand'),
                Tables\Columns\TextColumn::make('ram.brand'),
                Tables\Columns\TextColumn::make('vga.brand'),
                Tables\Columns\TextColumn::make('storage.brand'),
                Tables\Columns\TextColumn::make('psu.brand'),
                // Tables\Columns\TextColumn::make('case.brand'),
                Tables\Columns\TextColumn::make('monitor.brand'),
                Tables\Columns\TextColumn::make('keyboard.brand'),
                Tables\Columns\TextColumn::make('mouse.brand'),
                Tables\Columns\TextColumn::make('webcam.brand'),
                Tables\Columns\TextColumn::make('headphone.brand'),
                Tables\Columns\TextColumn::make('dvd.brand'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Delete')
                    ->action(function (PCInventory $record) {
                        $record->delete();
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-trash')
                    ->modalHeading('Delete Inventory')
                    ->modalSubheading('Are you sure you want to delete this inventory?')
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
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
            'lab' => Pages\LabInventoryPage::route('/lab-inventory/{lab}'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }
}
