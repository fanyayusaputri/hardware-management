<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas')->nullable();
            $table->string('no_telepon');
            $table->string('nama_perangkat');
            $table->integer('jumlah_perangkat');
            $table->enum('persetujuan', ['disetujui', 'ditolak', 'pending'])->default('pending');
            $table->dateTime('tanggal_peminjaman');
            $table->enum('status_pengembalian', ['belum_dikembalikan', 'sudah_dikembalikan'])->default('belum_dikembalikan');   
            $table->unsignedBigInteger('user_id');
            $table->dateTime('tanggal_pengembalian')->nullable();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
