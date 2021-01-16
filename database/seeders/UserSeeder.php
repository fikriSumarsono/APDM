<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name'=>'Muhammad Agreindra H. S.Kom., M.T',
            'level'=>'dosen dan lppm',
            'username' => '0420108603',
            'email'=>'agreindra@stmik-sumedang.ac.id',
            'password'=>bcrypt('0420108603'),
            'remember_token'=>Str::random(60),
        ]);
    }
}
