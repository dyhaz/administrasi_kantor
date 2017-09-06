<?php

use Illuminate\Database\Seeder;

class SifatSuratTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sifat_surat')->delete();
        
        \DB::table('sifat_surat')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Penting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Rahasia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Sangat Rahasia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Segera',
                'created_at' => '2017-07-28 05:31:03',
                'updated_at' => '2017-07-28 05:31:03',
            ),
        ));
        
        
    }
}