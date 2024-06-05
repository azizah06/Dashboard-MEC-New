<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mentor;
use App\Models\Sarpras;
use App\Models\Kelas;


class Jadwal extends Model
{
    use HasFactory;
    protected $table='jadwal';
    // protected $fillable =[
    //     'kode_jadwal',
    //     'mentors_id',
    //     'sarprass_id',
    //     'Kelass',
    //     'hari',
    //     'jam_mulai',
    //     'jam_akhir'
    // ];
    public function mentor()
    {
        return $this->belongsTo(Mentor::class,'mentors_id');
    }
    public function sarpras()
    {
        return $this->belongsTo(Sarpras::class, 'sarprass_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'Kelass');
    }
}
