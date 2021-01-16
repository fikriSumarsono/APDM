<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hak extends Model
{
    use HasFactory;
    protected $fillable = ['judul','jenis','status','nomor_hki','tahun','nomor_pendaftaran','nidn','url' ,'upload'];
    
}
