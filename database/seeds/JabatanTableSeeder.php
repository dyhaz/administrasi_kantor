<?php

use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jabatan')->delete();
        
        \DB::table('jabatan')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Ka UPT',
                'created_at' => '2017-07-31 05:54:52',
                'updated_at' => '2017-07-31 05:54:52',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Ka Subbag TU',
                'created_at' => '2017-07-31 05:55:06',
                'updated_at' => '2017-07-31 05:55:06',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Kepala Seksi Pengujian',
                'created_at' => '2017-07-31 05:55:19',
                'updated_at' => '2017-07-31 05:55:19',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Kepala Seksi Pengendalian Mutu',
                'created_at' => '2017-07-31 05:55:32',
                'updated_at' => '2017-07-31 05:55:32',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Staf Subbag TU',
                'created_at' => '2017-07-31 05:55:45',
                'updated_at' => '2017-07-31 05:55:45',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'Staf Seksi Pengujian',
                'created_at' => '2017-07-31 05:56:11',
                'updated_at' => '2017-07-31 05:56:11',
            ),
            6 => 
            array (
                'id' => 7,
                'nama' => 'Staf Seksi Pengendalian Mutu',
                'created_at' => '2017-07-31 05:56:23',
                'updated_at' => '2017-07-31 05:56:23',
            ),
        ));
        
        
    }
}