<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengingatPeminjamanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $peminjaman;

    public function __construct($peminjaman)
    {
        $this->peminjaman = $peminjaman;
    }

    public function build()
    {
        return $this->subject('Pengingat Peminjaman Perangkat')
                    ->view('emails.pengingat_peminjaman');
    }
}
