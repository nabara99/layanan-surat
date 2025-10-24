<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    /** @use HasFactory<\Database\Factories\JenisLayananFactory> */
    use HasFactory;

   protected $fillable = ['nama_layanan' , 'initial_name'];
}
