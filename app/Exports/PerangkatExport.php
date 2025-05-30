<?php
namespace App\Exports;

use App\Models\Perangkatserver;
use App\Models\Perangkatlab1;
use App\Models\Perangkatlab2;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class PerangkatExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil data perangkat untuk diekspor.
     */
    public function collection()
    {
        $perangkats_server = Perangkatserver::all();
        $perangkats_lab1 = Perangkatlab1::all();
        $perangkats_lab2 = Perangkatlab2::all();

        // Menggabungkan semua data perangkat
        return $perangkats_server->merge($perangkats_lab1)->merge($perangkats_lab2);
    }

    /**
     * Menentukan header kolom untuk file Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Foto',
            'Nama Perangkat',
            'Serial Number',
            'Merek',
            'Jumlah Stok',
            'Status',
            'Lokasi',
            'Tanggal Ditambahkan',
        ];
    }

    /**
     * Mapping data perangkat yang akan diekspor.
     */
    public function map($perangkat): array
    {
        return [
            $perangkat->id, // No (ID perangkat)
            $perangkat->gambar ? asset('storage/' . $perangkat->gambar) : 'N/A', // Foto (link gambar)
            $perangkat->nama, // Nama Perangkat
            $perangkat->sn ?? 'N/A', // Serial Number
            $perangkat->merek ?? 'N/A', // Merek Perangkat
            $perangkat->stok, // Jumlah Stok
            ucfirst($perangkat->status ?? 'N/A'), // Status (Tersedia / Tidak Tersedia)
            $perangkat->lokasi ?? 'N/A', // Lokasi
            Carbon::parse($perangkat->created_at)->format('d-m-Y H:i'), // Tanggal Ditambahkan
        ];
    }
}
