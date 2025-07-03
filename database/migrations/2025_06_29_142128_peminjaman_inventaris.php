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
        Schema::create('peminjaman_inventaris', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('peminjaman_id')->unsigned()->nullable()->comment('Terhubung ke peminjaman ruangan (jika ada)');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('inventaris_id')->unsigned();
            $table->integer('jumlah');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'selesai'])->default('menunggu');
            $table->enum('kondisi_kembali', ['baik', 'rusak_ringan', 'rusak_berat'])->nullable();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->timestamps();

            // Foreign keys with cascade delete
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('inventaris_id')->references('id')->on('inventaris')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null'); // Admin boleh nullable
            $table->foreign('peminjaman_id')->references('id')->on('peminjaman')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_inventaris');
    }
};
