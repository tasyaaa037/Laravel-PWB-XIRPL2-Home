<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;

class PembayaransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $petugasIds = DB::table('petugass')->pluck('id_petugas');
        $siswaNisns = DB::table('siswas')->pluck('nisn');
        $sppIds = DB::table('spps')->pluck('id_spp');

        DB::table('pembayarans')->Insert([
            'id_petugas' => $petugasIds->random(),
            'nisn' => $siswaNisns->random(),
            'tgl_bayar' => now(),
            'bulan_dibayar' => str::random(8),
            'tahun_dibayar' => str::random(4),
            'id_spp' => $sppIds->random(),
            'jumlah_bayar' => random_int(0, 5000000),
        ]);
    }
}
