<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanInventaris extends Model
{
    use HasFactory;

    const STATUS_MENUNGGU = 'menunggu';
    const STATUS_DISETUJUI = 'disetujui';
    const STATUS_DITOLAK = 'ditolak';
    const STATUS_SELESAI = 'selesai';

    protected $table = 'peminjaman_inventaris';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'inventaris_id',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali', // PERBAIKAN: Tambahkan kolom ini
        'jam_mulai',
        'jam_selesai',
        'status',
        'keperluan',
    ];

    /**
     * Get the user that owns the peminjaman.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the inventaris that is being borrowed.
     */
    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }
}
