<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Members', Member::query()->count()),
            Stat::make('Users', User::query()->count()),
        ];
    }
}
