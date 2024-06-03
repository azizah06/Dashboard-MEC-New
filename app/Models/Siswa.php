<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'jenis_Kelamins';
    use HasFactory;

    public function jenis_kelamins()
    {
        return $this->belongsTo(JenisKelamin::class);
    }
}
