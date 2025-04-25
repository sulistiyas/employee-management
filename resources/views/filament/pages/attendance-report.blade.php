<x-filament::page>
    <div class="text-lg font-semibold mb-4">Laporan Absensi 30 Hari Terakhir</div>

    <div class="overflow-x-auto rounded-xl shadow border bg-white">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama</th>
                    <th scope="col" class="px-6 py-3">Hadir</th>
                    <th scope="col" class="px-6 py-3">Telat</th>
                    <th scope="col" class="px-6 py-3">Izin</th>
                    <th scope="col" class="px-6 py-3">Cuti</th>
                    <th scope="col" class="px-6 py-3">Tidak Hadir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($this->data as $row)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium">{{ $row['name'] }}</td>
                        <td class="px-6 py-4">{{ $row['hadir'] }}</td>
                        <td class="px-6 py-4">{{ $row['telat'] }}</td>
                        <td class="px-6 py-4">{{ $row['izin'] }}</td>
                        <td class="px-6 py-4">{{ $row['cuti'] }}</td>
                        <td class="px-6 py-4">{{ $row['alpa'] }}</td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>

