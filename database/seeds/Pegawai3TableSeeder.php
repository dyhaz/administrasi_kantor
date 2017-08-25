<?php

use Illuminate\Database\Seeder;

class Pegawai3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Dymas',
            'alamat' => 'Surabaya',
            'id_divisi' => rand(1,100),
            'id_jabatan' => '4',
            'id_user' => \App\User::where("email","like","%kaseksipe%")->get()->first()->id,
            'id_kota' => '1',
            'jenis_kelamin' => 'L',
            'no_telp' => '1203819',
            'tanggal_lahir' => '1994-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Truno',
            'alamat' => 'Blitar',
            'id_divisi' => rand(1,100),
            'id_jabatan' => '6',
            'id_user' => \App\User::where("email","like","%stafseksipe%")->get()->first()->id,
            'id_kota' => '1',
            'jenis_kelamin' => 'L',
            'no_telp' => '1234456',
            'tanggal_lahir' => '1984-09-01',
        ]);

    }
}
