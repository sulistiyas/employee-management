<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Attendance;
use Filament\Pages\Page;
use Illuminate\Support\Carbon;

class AttendanceReport extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';
    protected static string $view = 'filament.pages.attendance-report';
    protected static ?string $title = 'Laporan Absensi';

    public $data = [];

    public function mount()
    {
        $this->generateReport();
    }

    public function generateReport()
    {
        $start = Carbon::now()->subDays(30);
        $end = Carbon::now();

        $totalDays = $start->diffInDays($end) + 1;

        $this->data = User::role(['manager', 'director','hrd','staff'])->get()->map(function ($user) use ($start, $end, $totalDays) {
            $statuses = Attendance::where('user_id', $user->id)
                ->whereBetween('date', [$start, $end])
                ->selectRaw('status, count(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status')
                ->all();

            return [
                'name' => $user->name,
                'hadir' => $statuses['hadir'] ?? 0,
                'telat' => $statuses['telat'] ?? 0,
                'izin' => $statuses['izin'] ?? 0,
                'cuti' => $statuses['cuti'] ?? 0,
                'alpa' => $statuses['alpa'] ?? 0,
            ];
        });
    }
}
