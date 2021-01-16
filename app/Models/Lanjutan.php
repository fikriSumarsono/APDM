<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lanjutan extends Model
{
    use HasFactory;
    protected $fillable =['judul','nidn','tahun','usulan','logbook','laporan_kemajuan','laporan_akhir'];
}
