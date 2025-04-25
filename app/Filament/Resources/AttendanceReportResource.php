<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceReportResource\Pages;
use App\Filament\Resources\AttendanceReportResource\RelationManagers;
use App\Models\Attendance;
use App\Models\AttendanceReport;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttendanceReportResource extends Resource
{
    protected static ?string $model = Attendance::class;

    protected static ?string $navigationLabel = 'Attendance Report';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Reports';

    protected static ?int $navigationSort = 5;
    protected static bool $shouldRegisterNavigation = false;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->label('Date')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'hadir' => 'Hadir',
                        'telat' => 'Telat',
                        'izin' => 'Izin',
                        'cuti' => 'Cuti',
                        'alpa' => 'Alpa',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')->label('User ID'),
                Tables\Columns\TextColumn::make('check_in')->label('Check In'),
                Tables\Columns\TextColumn::make('check_out')->label('Check Out'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('date')->label('Date'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'hadir' => 'Hadir',
                        'telat' => 'Telat',
                        'izin' => 'Izin',
                        'cuti' => 'Cuti',
                        'alpa' => 'Alpa',
                    ]),
            ])
            ->actions([
                // Tables\Actions\Action::make('view')
                //     ->label('View Report')
                //     ->url(fn (Attendance $record) => view('livewire.attendance_show', $record)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendanceReports::route('/'),
            'create' => Pages\CreateAttendanceReport::route('/create'),
            'edit' => Pages\EditAttendanceReport::route('/{record}/edit'),
        ];
    }
}
