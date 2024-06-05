<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;

class Sarpras extends Model
{
    use HasFactory;
    protected $table='sarpras';
    protected $fillable=[];
    public function jadwals()
    {
        return$this->hasMany(Jadwal::class,'sarprass_id');
    }
}
