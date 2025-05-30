<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeminjamanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil data peminjaman untuk diekspor.
     */
    public function collection()
    {
        return Peminjaman::all();
    }

    /**
     * Menentukan header kolom untuk file Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kelas',
            'No Telepon',
            'Nama Perangkat',
            'Jumlah Perangkat',
            'Status',
            'Tanggal Peminjaman',
        ];
    }

    /**
     * Mapping data yang akan diekspor.
     */


    public function map($peminjaman): array
    {
        return [
            $peminjaman->id,
            $peminjaman->nama,
            $peminjaman->kelas,
            $peminjaman->no_telepon,
            $peminjaman->nama_perangkat,
            $peminjaman->jumlah_perangkat,
            $peminjaman->persetujuan,
            Carbon::parse($peminjaman->tanggal_peminjaman)->format('d-m-Y H:i'),
        ];
    }

}
