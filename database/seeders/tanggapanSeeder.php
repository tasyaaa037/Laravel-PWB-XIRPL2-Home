<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class tanggapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tanggapanIds = DB::table('tanggapans')->pluck('id_tanggapan')->toArray();
        $pengaduanIds = DB::table('pengaduans')->pluck('id_pengaduan')->toArray();
        $petugasIds = DB::table('petugases')->pluck('id_petugas')->toArray();

        if (!empty($tanggapanIds && $pengaduanIds && $petugasIds)) {
            DB::table('tanggapans')->insert([ 
                'id_tanggapan' => $tanggapanIds[array_rand($tanggapanIds)], 
                'id_pengaduan' => $pengaduanIds[array_rand($pengaduanIds)],
                'tanggal_tanggapan' => now(), 
                'tanggapan' => Str::random(16),
                'isi_laporan' => Str::random(),
                'id_petugas' => $petugasIds[array_rand($petugasIds)],
            ]);
        }
    }
}
