<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $pengaduanIds = DB::table('pengaduan')->pluck('id_pengaduan');


        DB::table('pengaduan')->Insert([
            'id_pengaduan' => $pengaduanIds->random(),
            'tanggal_pengaduan' => now(),
            'nik' => Str::random(16),
            'isi_laporan' => Str::random(),
            'foto' => Str::random(255),
            'status' => collect(['0','proses','selesai'])->random(),
        ]);
    }
}
