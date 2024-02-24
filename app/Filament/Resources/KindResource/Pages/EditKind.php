<?php

namespace App\Filament\Resources\KindResource\Pages;

use App\Filament\Resources\KindResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKind extends EditRecord
{
    protected static string $resource = KindResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
