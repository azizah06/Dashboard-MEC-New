<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;
    protected $table = 'mentor';
    protected  $fillable = [
        'kd_mentor',
        'nama',
        'email',
        'jenis_kelamin',
        'pendidikan',
        'alamat',
    ];
}
