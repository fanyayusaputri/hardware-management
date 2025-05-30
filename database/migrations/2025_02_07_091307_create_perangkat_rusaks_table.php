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
        Schema::create('perangkat_rusaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('perangkat');
            $table->text('deskripsi');
            $table->date('tanggal_ajukan');
            $table->enum('status', ['DI PERIKSA', 'DI PERBAIKI', 'SELESAI DI PERBAIKI'])->default('DI PERIKSA');
            $table->string('bukti_kerusakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_rusaks');
    }
};
