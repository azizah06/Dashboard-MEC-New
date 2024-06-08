<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkt_kelas extends Model
{
    use HasFactory;
    protected $table = 'pkt_kelas';

    protected $fillable = [
        'kd_pkt_kelas',
        'nama_kelas',
        'harga'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }
}
