<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaksi';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_bayar',
        'siswass_id',
        'kelas_id',
    
        'tanggal_bayar',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_bayar' => 'date',
    ];

    /**
     * Get the siswa associated with the transaksi.
     */
    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'siswass_id');
    }

    /**
     * Get the kelas associated with the transaksi.
     */
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'kelas_id');
    }
}
