<?php

namespace App\Exports;

use App\Models\Pengembalian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class PengembalianExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * Mengambil data pengembalian untuk diekspor.
     */
    public function collection()
    {
        return Pengembalian::with('peminjaman')->get();
    }

    /**
     * Menentukan header kolom untuk file Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Nama Perangkat',
            'Kelas',
            'Jumlah Perangkat',
            'Status Pengembalian',
            'Tanggal Pengembalian',
        ];
    }

    /**
     * Mapping data yang akan diekspor.
     */
    public function map($pengembalian): array
    {
        return [
            $pengembalian->id,
            $pengembalian->nama,
            $pengembalian->peminjaman->nama_perangkat ?? 'N/A',
            $pengembalian->kelas,
            $pengembalian->jumlah_perangkat,
            ucfirst($pengembalian->status_pengembalian),
            Carbon::parse($pengembalian->tanggal_pengembalian)->format('d-m-Y H:i'),
        ];
    }
}
