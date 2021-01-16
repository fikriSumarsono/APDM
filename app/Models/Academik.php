<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academik extends Model
{
    use HasFactory;
    protected $fillable = ['nidn', 'judul','jenis','peruntukan','peran','penyerahan','pejabat_penerima','tahun','url','upload'];
 
}
