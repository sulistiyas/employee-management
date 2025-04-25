<x-filament::widget>
    <x-filament::card>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
            <div>
                <div class="text-2xl font-bold text-primary">{{ $totalEmployees }}</div>
                <div class="text-sm text-gray-600">Total Karyawan</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-success">{{ $absentToday }}</div>
                <div class="text-sm text-gray-600">Absen Hari Ini</div>
            </div>
            <div>
                <div class="text-2xl font-bold text-warning">{{ $onLeaveToday }}</div>
                <div class="text-sm text-gray-600">Cuti Aktif Hari Ini</div>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
