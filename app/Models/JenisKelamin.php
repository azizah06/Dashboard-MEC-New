<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model

{
    protected $table = 'siswa';
    use HasFactory;


    public function siswass()
    {
        return $this->hasMany(Siswa::class);
    }
}
