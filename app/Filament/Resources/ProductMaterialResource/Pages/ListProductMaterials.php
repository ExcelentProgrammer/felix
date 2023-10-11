<?php

namespace App\Filament\Resources\ProductMaterialResource\Pages;

use App\Filament\Resources\ProductMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductMaterials extends ListRecords
{
    protected static string $resource = ProductMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
