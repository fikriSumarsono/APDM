<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use HasFactory;
    protected $fillable = ['jenis','deskripsi','tingkat','tahun','nidn','url' ];
}
