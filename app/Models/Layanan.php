<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    /** @use HasFactory<\Database\Factories\LayananFactory> */
    use HasFactory;

    protected $fillable = [ 'id_layanan',
                            'nomor',
                            'nama',
                            'tempat',
                            'tanggal',
                            'agama',
                            'nik',
                            'pekerjaan',
                            'status_perkawinan',
                            'jenis_kelamin',
                            'alamat',
                            'keperluan',
                            'tanggal_meninggal',
                            'tempat_meninggal',
                            'penyebab_meninggal',
                            'status',
                            'memo',
                        ];
     public function jenisLayanan()
    {
     return $this->belongsTo(JenisLayanan::class, 'id_layanan');
    }
}
