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
        Schema::table('peminjaman_inventaris', function (Blueprint $table) {
            // Menambahkan kolom 'keperluan' setelah kolom 'status'
            // Dibuat nullable() untuk keamanan jika ada data lama yang tidak memiliki keperluan
            $table->text('keperluan')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peminjaman_inventaris', function (Blueprint $table) {
            // Ini akan menghapus kolom jika Anda perlu membatalkan migrasi
            $table->dropColumn('keperluan');
        });
    }
};
