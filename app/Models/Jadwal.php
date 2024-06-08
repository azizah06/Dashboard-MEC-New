<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mentor;
use App\Models\Sarpra;
use App\Models\Pkt_kelas;


class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $fillable = [
        'kd_jadwal', 'hari', 'pkt_kelas_id', 'mentor_id', 'sarpra_id', 'jam_mulai', 'jam_akhir',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function sarpra()
    {
        return $this->belongsTo(Sarpra::class, 'sarpra_id');
    }

    public function pkt_kelas()
    {
        return $this->belongsTo(Pkt_kelas::class, 'pkt_kelas_id');
    }
}
