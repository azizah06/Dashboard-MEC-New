<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;

class Mentor extends Model
{
    use HasFactory;
    protected $table = 'mentor';
    protected $fillable=[
        'kode_mentor',
        'nama',
        'email',
        'no_telepon',
        'jenis_kelamin',
        'pendidikan',
        'alamat'
    ];

    // public function jadwals( )
    // {
    //     return $this->hasMany(Jadwal::class,'mentors_id');
    // }
}
