<?php

use Illuminate\Database\Seeder;

class KotaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kota')->delete();
        
        \DB::table('kota')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Jakarta',
                'created_at' => '2017-07-31 05:51:55',
                'updated_at' => '2017-07-31 05:51:55',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Tangerang',
                'created_at' => '2017-07-31 05:52:11',
                'updated_at' => '2017-07-31 05:52:11',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Depok',
                'created_at' => '2017-07-31 05:52:22',
                'updated_at' => '2017-07-31 05:52:22',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Bekasi',
                'created_at' => '2017-07-31 05:52:37',
                'updated_at' => '2017-07-31 05:52:37',
            ),
        ));
        
        
    }
}