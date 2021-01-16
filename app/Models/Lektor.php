<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lektor extends Model
{
    use HasFactory;
    protected $fillable=['nidn','nama','no_hp','foto','skill','institusi','program_studi','pendidikan','jabatan','alamat','tanggal_lahir','no_ktp','email'];
   

   

}
