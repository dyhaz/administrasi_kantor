<?php

use Illuminate\Database\Seeder;

class KegiatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatan')->insert([
            'nama' => 'Program',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Penyuluhan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Teknologi',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Produksi',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Pelelangan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Usaha Perikanan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Pembibitan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Daerah Penangkapan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Pertambakan, meliputi : Tambak Ikan Deras, Tambak Udang dan lain-lain',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'pertambangan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Sarana',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Peralatan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Kapal',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Pelabuhan',
        ]);
        DB::table('kegiatan')->insert([
            'nama' => 'Pengusahan, Nelayan',
        ]);

    }
}
