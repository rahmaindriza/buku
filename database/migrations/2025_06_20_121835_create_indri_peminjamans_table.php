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
        Schema::create('indri_peminjamans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_peminjaman');
            $table->date('tgl_kembali')->nullable();
           $table->date('tgl_rencana_kembali'); // tanggal yang direncanakan saat peminjaman
            $table->enum('status_pengembalian', ['DiPinjam', 'DiKembalikan', 'Terlambat'])->default('dipinjam');

            $table->foreignId('anggota_id') ->constrained('indri_anggotas')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('indri_peminjamans_bukus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('peminjaman_id')->constrained('indri_peminjamans')->onDelete('cascade');
            $table->foreignId('buku_id')->constrained('indri_bukus')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indri_peminjamans');
        Schema::dropIfExists('indri_peminjamans_bukus');
    }
};
