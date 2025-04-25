<?php

namespace App\Livewire;

use Filament\Widgets\Widget;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Leave;
use Illuminate\Support\Carbon;
class EmployeeWidget extends Widget
{
    protected static string $view = 'livewire.employee-widget';
    protected function getViewData(): array
    {
        $today = Carbon::today();

        return [
            'totalEmployees' => User::whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['superadmin']);
            })->count(),
            'absentToday' => Attendance::whereDate('date', $today)->count(),
            'onLeaveToday' => Leave::where('status', 'approved')
                ->whereDate('start_date', '<=', $today)
                ->whereDate('end_date', '>=', $today)
                ->count(),
        ];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.employee-widget', $this->getViewData());
    }
}
