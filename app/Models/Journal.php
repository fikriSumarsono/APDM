<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable=['judul','nama_jurnal','nidn','nomor','issn','jenis_publikasi','peran_penulis','tahun','volume','url'];
}
