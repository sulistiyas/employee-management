<?php

namespace App\Livewire;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Attendance;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\Action;
use Spatie\SimpleExcel\SimpleExcelWriter;

class AttendanceReportTable extends BaseWidget
{
    protected static ?string $heading = 'Laporan Absensi';

    protected int|string|array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {   
        return $table
            ->headerActions([
                Action::make('Export ke Excel')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        $fileName = 'laporan-absensi.xlsx';
            
                        $users = $this->getAttendanceSummaryQuery()->get();
            
                        $data = $users->map(function ($user) {
                            return [
                                'Nama' => $user->name,
                                'Hadir' => $user->hadir ?? 0,
                                'Telat' => $user->telat ?? 0,
                                'Izin' => $user->izin ?? 0,
                                'Cuti' => $user->cuti ?? 0,
                                'Alpa' => $user->alpa ?? 0,
                            ];
                        });
                        $tempPath = storage_path('app/tmp');
                        if (!is_dir($tempPath)) {
                            mkdir($tempPath, 0777, true);
                        }

                        $tempFile = $tempPath . '/laporan-absensi-' . now()->timestamp . '.xlsx';

                        SimpleExcelWriter::create($tempFile)
                            ->addRows($data->toArray())
                            ->toBrowser('laporan-absensi.xlsx');
                        // 
                    }),
            ])
            ->query($this->getAttendanceSummaryQuery())
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('hadir')
                    ->label('Hadir')
                    ->sortable(),

                Tables\Columns\TextColumn::make('telat')
                    ->label('Telat')
                    ->sortable(),

                Tables\Columns\TextColumn::make('izin')
                    ->label('Izin')
                    ->sortable(),

                Tables\Columns\TextColumn::make('cuti')
                    ->label('Cuti')
                    ->sortable(),

                Tables\Columns\TextColumn::make('alpa')
                    ->label('Alpa')
                    ->sortable(),
            ])
            ->filters([
                Filter::make('date_range')
                    ->form([
                        DatePicker::make('from')->label('Dari'),
                        DatePicker::make('until')->label('Sampai'),
                    ])
                    ->indicateUsing(function (array $data): ?string {
                        if (!$data['from'] && !$data['until']) return null;
            
                        $from = $data['from'] ? \Carbon\Carbon::parse($data['from'])->format('d M Y') : '...';
                        $until = $data['until'] ? \Carbon\Carbon::parse($data['until'])->format('d M Y') : '...';
                        return "Periode: {$from} - {$until}";
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->whereHas('attendances', function ($q) use ($data) {
                            if ($data['from']) {
                                $q->whereDate('date', '>=', $data['from']);
                            }
                            if ($data['until']) {
                                $q->whereDate('date', '<=', $data['until']);
                            }
                        });
                    }),
            
                Filter::make('Hari Ini')
                    ->query(fn ($query) => $query->whereHas('attendances', fn ($q) =>
                        $q->whereDate('date', today())
                    )),
            
                Filter::make('Minggu Ini')
                    ->query(fn ($query) => $query->whereHas('attendances', fn ($q) =>
                        $q->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
                    )),
            
                Filter::make('Bulan Ini')
                    ->query(fn ($query) => $query->whereHas('attendances', fn ($q) =>
                        $q->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
                    )),
            ]);
    }

    private function getAttendanceSummaryQuery(): Builder
    {
        return User::role(['manager', 'director','hrd','staff'])
            ->select('users.id', 'users.name')
            ->withCount([
                'attendances as hadir' => function ($query) {
                    $query->where('status', 'hadir');
                },
                'attendances as telat' => function ($query) {
                    $query->where('status', 'telat');
                },
                'attendances as izin' => function ($query) {
                    $query->where('status', 'izin');
                },
                'attendances as cuti' => function ($query) {
                    $query->where('status', 'cuti');
                },
                'attendances as alpa' => function ($query) {
                    $query->where('status', 'alpa');
                },
            ]);
    }
}
