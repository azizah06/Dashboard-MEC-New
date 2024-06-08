<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarpra extends Model
{
    use HasFactory;
    protected $table = 'sarpra';
    protected  $fillable = [
        'kd_sarpra',
        'nama_ruangan',
        'kapasitas',
        'jmlh_baik',
        'jmlh_rusak',
        'meja_mentor',
        'kursi_mentor',
        'kursi_meja_siswa',
        'kipas',
        'papan_tulis',
        'keterangan',
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
