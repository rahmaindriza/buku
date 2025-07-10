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
    Schema::table('indri_anggotas', function (Blueprint $table) {
        $table->string('nis')->after('id');
        $table->string('kelas')->after('nis');
        $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('kelas');
    });
}

public function down(): void
{
    Schema::table('indri_anggotas', function (Blueprint $table) {
        $table->dropColumn(['nis', 'kelas', 'jenis_kelamin']);
    });
}

};
