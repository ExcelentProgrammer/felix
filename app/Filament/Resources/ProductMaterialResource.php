<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductMaterialResource\Pages;
use App\Filament\Resources\ProductMaterialResource\RelationManagers;
use App\Models\ProductMaterial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class ProductMaterialResource extends Resource
{
    protected static ?string $model = ProductMaterial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship('product', 'name')->preload()->required(),
                Select::make("material_id")->relationship("material", "name")->required()->unique(),
                TextInput::make("quantity")->numeric()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("product.name"),
                TextColumn::make("material.name"),
                TextColumn::make("quantity")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProductMaterials::route('/'),
            'create' => Pages\CreateProductMaterial::route('/create'),
            'edit' => Pages\EditProductMaterial::route('/{record}/edit'),
        ];
    }
}