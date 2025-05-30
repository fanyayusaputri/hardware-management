<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // user_id mengacu ke tabel siswas (sesuaikan)
            $table->string('nama'); 
            $table->string('kelas'); 
            $table->integer('jumlah_perangkat'); 
            $table->unsignedBigInteger('peminjaman_id'); 
            $table->datetime('tanggal_pengembalian');
            $table->enum('status_pengembalian', ['belum_dikembalikan', 'sudah_dikembalikan'])->default('belum_dikembalikan');
            $table->string('bukti_pengembalian')->nullable();
            $table->text('alasan_belum_dikembalikan')->nullable(); 
            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('siswa')->onDelete('cascade');

            $table->foreign('peminjaman_id')->references('id')->on('peminjaman')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['peminjaman_id']);
        });

        Schema::dropIfExists('pengembalian');
    }
};
