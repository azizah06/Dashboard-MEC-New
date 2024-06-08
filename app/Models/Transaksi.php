<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kd_bayar',
        'siswa_id',
        'pkt_kls_id',
        'nama_siswa',
        'paket_kelas',
        'tgl_bayar',
        'bukti_bayar',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function pkt_kelas()
    {
        return $this->belongsTo(Pkt_kelas::class);
    }
}
