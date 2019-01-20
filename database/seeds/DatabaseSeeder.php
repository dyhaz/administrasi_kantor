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
        $this->call(KegiatanTableSeeder::class);
        $this->call(KlasifikasiArsipTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PegawaiTableSeeder::class);
        $this->call(Pegawai2TableSeeder::class);
        $this->call(Pegawai3TableSeeder::class);
        $this->call(IsiDisposisiTableSeeder::class);
        $this->call(JabatanTableSeeder::class);
        $this->call(DivisiTableSeeder::class);
        $this->call(SifatSuratTableSeeder::class);
        $this->call(KotaTableSeeder::class);
    }
}
