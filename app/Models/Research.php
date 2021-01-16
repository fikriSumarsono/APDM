<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use HasFactory;
    protected $table = 'researchs';
    protected $fillable = ['judul','nidn','tahun','peran','nama','approve','file','perbaikan_usulan','laporan_kemajuan','logbook','laporan_akhir','usulan_lanjutan'];
}
