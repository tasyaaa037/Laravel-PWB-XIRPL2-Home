<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str; 

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $petugasIds = DB::table('petugas')->pluck('id_petugas');

        DB::table('petugas')->insert([
            'id_petugas'=> $petugasIds->random(),
            'nama_petugas'=> Str::random(35),
            'username'=> Str::random(25),
            'password'=> Str::random(32),
            'telepon'=> Str::random(13),
            'level'=> collect(['admin','petugas'])->random(),
        ]);
    }
}
