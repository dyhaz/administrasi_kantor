<?php

use Illuminate\Database\Seeder;

class PegawaiTableSeeder extends Seeder
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
            'nama' => 'Hadi',
            'alamat' => 'Jalan Pahlawan 80',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '1203819',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '2010-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Joe',
            'alamat' => 'Malang',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '1234456',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1990-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Ferry',
            'alamat' => 'Sby',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '9090909090',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1990-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Affan',
            'alamat' => 'Sidoarjo',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '909090909090',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1990-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Arna',
            'alamat' => 'ABCDEF',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => '0',
            'no_telp' => '1234456',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1970-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Fahhri',
            'alamat' => 'Kepanjen',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '12345678',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1988-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Sonny',
            'alamat' => 'Los Angeles',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '123',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1999-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Setyo Wardana',
            'alamat' => 'Jakarta',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '123',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '2000-11-10',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Veni Vidi Vici',
            'alamat' => 'Surabaya',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '11111',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1990-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Alvian',
            'alamat' => 'Gresik',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '123',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '2000-01-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Jojo Josuta',
            'alamat' => 'Cimanggi',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '11',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1971-09-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Afghan',
            'alamat' => 'Bekasi',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '08878787',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1978-07-01',
        ]);
        DB::table('pegawai')->insert([
            'nip' => str_random(10),
            'nama' => 'Sonna',
            'alamat' => 'Malaysia',
            'id_divisi' => rand(1,100),
            'id_jabatan' => rand(1,100),
            'jenis_kelamin' => 'L',
            'no_telp' => '999999',
            'id_user' => \App\User::where("email","like","%superuser@%")->get()->first()->id,
            'id_kota' => '1',
            'tanggal_lahir' => '1990-09-01',
        ]);
    }
}
