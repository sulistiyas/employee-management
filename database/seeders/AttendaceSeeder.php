<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AttendaceSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan jumlah user yang ada
        $userIds = \App\Models\User::pluck('id')->toArray();

        // Membuat data dummy
        foreach (range(1, 30) as $index) {
            $userId = $userIds[array_rand($userIds)];
            $checkIn = Carbon::today()->subDays(rand(1, 10))->setTime(rand(7, 9), rand(0, 59)); // Check-in antara jam 7 sampai 9 pagi
            $checkOut = (clone $checkIn)->addHours(rand(6, 8)); // Check-out setelah 6 sampai 8 jam
            $date = $checkIn->format('Y-m-d');
            
            // Menentukan status berdasarkan kondisi acak
            $statusOptions = ['hadir', 'telat', 'izin', 'cuti', 'alpa'];
            $status = $statusOptions[array_rand($statusOptions)];

            // Untuk status 'telat', pastikan check_in lebih dari jam 9 pagi
            if ($status === 'telat') {
                $checkIn = Carbon::today()->subDays(rand(1, 10))->setTime(rand(9, 11), rand(0, 59)); // Telat check-in
                $checkOut = (clone $checkIn)->addHours(rand(6, 8)); // Check-out setelah 6 sampai 8 jam
            }

            // Menyimpan data ke tabel attendance
            DB::table('attendances')->insert([
                'user_id' => $userId,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'status' => $status,
                'date' => $date,
            ]);
        }
    }
}
