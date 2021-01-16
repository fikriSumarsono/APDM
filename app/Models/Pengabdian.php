<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengabdian extends Model
{
    use HasFactory;
    protected $table = 'pengabdians';
    protected $fillable = ['judul','nidn','nama','tahun','peran','approve','file','perbaikan_usulan','laporan_kemajuan','logbook','laporan_akhir','usulan_lanjutan'];
}
