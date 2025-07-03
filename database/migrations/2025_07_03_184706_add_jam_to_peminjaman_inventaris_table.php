<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Method up() -> untuk menambahkan kolom
    public function up(): void
    {
        Schema::table('peminjaman_inventaris', function (Blueprint $table) {
            // Tambahkan kolom ini setelah kolom 'tanggal_kembali'
            $table->time('jam_mulai')->after('tanggal_kembali');
            $table->time('jam_selesai')->after('jam_mulai');
        });
    }

    // Method down() -> untuk membatalkan jika perlu
    public function down(): void
    {
        Schema::table('peminjaman_inventaris', function (Blueprint $table) {
            $table->dropColumn(['jam_mulai', 'jam_selesai']);
        });
    }
};
