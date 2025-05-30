<?php
namespace App\Mail;

use App\Models\Peminjaman;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengingatPengembalianMail extends Mailable
{
    use Queueable, SerializesModels;

    public $peminjaman;

    public function __construct(Peminjaman $peminjaman)
    {
        $this->peminjaman = $peminjaman;
    }

    public function build()
    {
        return $this->subject('Pengingat Pengembalian Perangkat')
            ->view('emails.pengingat_pengembalian');
    }
}
