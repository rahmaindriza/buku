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
        Schema::rename('bukus', 'indri_bukus');
        Schema::rename('kategoris', 'indri_kategoris');
        Schema::rename('penerbits', 'indri_penerbits');
    }

    public function down(): void
    {
        Schema::rename('indri_bukus', 'bukus');
        Schema::rename('indri_kategoris', 'kategoris');
        Schema::rename('indri_penerbits', 'penerbits');
    }
};
