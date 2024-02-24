<?php

namespace App\Filament\Resources\KindResource\Pages;

use App\Filament\Resources\KindResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKinds extends ListRecords
{
    protected static string $resource = KindResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
