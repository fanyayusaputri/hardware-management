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
        Schema::create('perangkatlab2s', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable(); // Nama file gambar perangkat
            $table->string('nama'); // Nama perangkat
            $table->text('deskripsi'); // Deskripsi perangkat
            $table->string('lokasi'); // Lokasi perangkat
            $table->integer('stok')->default(0); // Jumlah stok perangkat
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif'); // Status perangkat
            $table->string('tipe'); // Tipe perangkat, bisa menyesuaikan dengan tipe yang diinginkan
            $table->string('sn')->nullable(); // Serial Number perangkat
            $table->string('merek'); // Merek perangkat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkatlab2s');
    }
};
