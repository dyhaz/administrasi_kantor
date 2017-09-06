<?php

use Illuminate\Database\Seeder;

class DivisiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('divisi')->delete();
        
        \DB::table('divisi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Ka UPT',
                'created_at' => '2017-07-31 05:51:55',
                'updated_at' => '2017-07-31 05:51:55',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Subbag TU',
                'created_at' => '2017-07-31 05:52:11',
                'updated_at' => '2017-07-31 05:52:11',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Seksi Pengujian',
                'created_at' => '2017-07-31 05:52:22',
                'updated_at' => '2017-07-31 05:52:22',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Seksi Pengendalian Mutu',
                'created_at' => '2017-07-31 05:52:37',
                'updated_at' => '2017-07-31 05:52:37',
            ),
        ));
        
        
    }
}