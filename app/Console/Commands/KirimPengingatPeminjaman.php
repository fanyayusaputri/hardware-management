<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengingatPeminjamanMail;

class KirimPengingatPeminjaman extends Command
{
    protected $signature = 'pengingat:peminjaman';
    protected $description = 'Kirim pengingat email H-1 sebelum pengembalian';

    public function handle()
    {
        $besok = Carbon::tomorrow()->startOfDay();

        $peminjamans = Peminjaman::whereDate('tanggal_pengembalian', $besok)->get();

        foreach ($peminjamans as $peminjaman) {
            Mail::to($peminjaman->email)->send(new PengingatPeminjamanMail($peminjaman));
        }

        $this->info('Email pengingat berhasil dikirim untuk H-1 pengembalian.');
    }
}

