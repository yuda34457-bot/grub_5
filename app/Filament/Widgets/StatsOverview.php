<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\EyeTest;
use App\Models\Transaction;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Pengguna', User::where('role', 'user')->count())
                ->description('Pengguna terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
            Stat::make('Total Tes Mata', EyeTest::count())
                ->description('Semua tes dilakukan')
                ->descriptionIcon('heroicon-m-eye')
                ->color('success'),
            Stat::make('Total Pendapatan', 'Rp ' . number_format(Transaction::where('status', 'paid')->sum('amount'), 0, ',', '.'))
                ->description('Dari PDF & Konsultasi')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('warning'),
        ];
    }
}
