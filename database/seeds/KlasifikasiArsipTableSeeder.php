<?php

use Illuminate\Database\Seeder;

class KlasifikasiArsipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Organisasi Badan Non Pemerintah',
            'nomor' => '062',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Organisasi Badan Internasional',
            'nomor' => '063',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Organisasi Badan Semi Pemerintah, BKS-Aksi',
            'nomor' => '062',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Ketatalaksanaan/Tata Naskah/Sistem',
            'nomor' => '065',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Stempel Dinas',
            'nomor' => '065',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Pelayanan Umum',
            'nomor' => '067',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Komputerisasi/Siskomdagri',
            'nomor' => '068',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Kecamatan/Desa',
            'nomor' => '079',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Perikanan',
            'nomor' => '523',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Peternakan',
            'nomor' => '524',
        ]);
        DB::table('klasifikasi_arsip')->insert([
            'nama' => 'Perkebunan',
            'nomor' => '525',
        ]);
    }
}
