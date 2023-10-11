<?php

namespace App\Filament\Resources\ProductMaterialResource\Pages;

use App\Filament\Resources\ProductMaterialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductMaterial extends EditRecord
{
    protected static string $resource = ProductMaterialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
