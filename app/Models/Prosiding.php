<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prosiding extends Model
{
    use HasFactory;
    protected $fillable = ['isbn_issn','judul','nama_prosiding','jenis_prosiding','peran_penulis','tahun_prosiding','nidn','volume','nomor','url','upload'];
}
