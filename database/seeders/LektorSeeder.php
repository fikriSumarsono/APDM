<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lektor;

class LektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lektor::truncate();
        Lektor::create([
            'nidn' => '0420108603',
            'no_ktp' =>'3211222010860005',
            'nama' => 'Muhammad Agreindra H. S.Kom., M.T',
            'tanggal_lahir' => 'Jakarta/20-10-1986',
            'no_hp' => '08112145458',
            'email' => 'agreindra@stmik-sumedang.ac.id',
            'skill' => 'Software Engineer',
            'institusi' => 'STMIK Sumedang',
            'jabatan' => 'dosen dan lppm',
            'program_studi' => 'Teknik Informatika',
            'pendidikan' => 'S-2',
            'alamat' =>'Ling. Cipeuteuy Baru RT/RW 04/06, Kelurahan Situ, Kec. Sumedang Utara'
            ]);
    }
}
