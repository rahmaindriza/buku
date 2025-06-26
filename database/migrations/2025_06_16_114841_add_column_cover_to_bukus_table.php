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
        Schema::table('indri_bukus', function (Blueprint $table) {
            $table->string('cover')->after('pengarang')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('indri_bukus', function (Blueprint $table) {
             $table->dropColumn('cover');
        });
    }
};
