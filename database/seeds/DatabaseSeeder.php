<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(KegiatanTableSeeder::class);
        //$this->call(KlasifikasiArsip::class);
        //$this->call(RoleTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(PegawaiTableSeeder::class);
        //$this->call(Pegawai2TableSeeder::class);
        $this->call(Pegawai3TableSeeder::class);
    }
}
