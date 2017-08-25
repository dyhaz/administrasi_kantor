<?php

use Illuminate\Database\Seeder;

class Pegawai2TableSeeder extends Seeder
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
            'nama' => 'Staf Subbag tu',
            'alamat' => 'asdfdfsd',
            'id_divisi' => rand(1,100),
            'id_jabatan' => '5',
            'id_user' => \App\User::where("email","like","%stafsubbagtu%")->get()->first()->id,
            'id_kota' => '1',
            'jenis_kelamin' => 'L',
            'no_telp' => '1203819',
            'tanggal_lahir' => '2010-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'KA UPT',
            'alamat' => 'Malang',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'id_user' => \App\User::where("email","like","%kaupt@%")->get()->first()->id,
            'id_kota' => '1',
            'jenis_kelamin' => 'L',
            'no_telp' => '1234456',
            'tanggal_lahir' => '1990-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Ferry Kasubbag',
            'alamat' => 'Sby',
            'id_divisi' => rand(1,100),
            'id_jabatan' => '2',
            'id_user' => \App\User::where("email","like","%kasubbagtu%")->get()->first()->id,
            'id_kota' => '1',
            'jenis_kelamin' => 'L',
            'no_telp' => '9090909090',
            'tanggal_lahir' => '1990-09-01',
        ]);

    }
}
