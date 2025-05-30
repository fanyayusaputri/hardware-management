<?php
namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa::select('id', 'name', 'email', 'nis', 'kelas')->get();
    }

    public function headings(): array
    {
        return ["ID", "Nama", "Email", "NIS", "Kelas"];
    }
}
