<?php

namespace App\Filament\Resources\LinkTypeResource\Pages;

use App\Filament\Resources\LinkTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLinkTypes extends ListRecords
{
    protected static string $resource = LinkTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
