<?php

use Illuminate\Database\Seeder;

class IsiDisposisiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('isi_disposisi')->delete();
        
        \DB::table('isi_disposisi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'isi' => 'bicarakan dengan saya',
                'created_at' => '2017-07-29 09:12:23',
                'updated_at' => '2017-07-29 09:12:23',
            ),
            1 => 
            array (
                'id' => 2,
                'isi' => 'Koordinasikan',
                'created_at' => '2017-07-29 09:12:44',
                'updated_at' => '2017-07-29 09:12:44',
            ),
            2 => 
            array (
                'id' => 3,
                'isi' => 'Seperlunya',
                'created_at' => '2017-07-29 09:12:57',
                'updated_at' => '2017-07-29 09:12:57',
            ),
            3 => 
            array (
                'id' => 4,
                'isi' => 'Berikan saran',
                'created_at' => '2017-07-29 09:13:24',
                'updated_at' => '2017-07-29 09:13:24',
            ),
            5 => 
            array (
                'id' => 6,
                'isi' => 'dfasdf asf as 
asr werf a
f asxx
fsr 
wer
',
                'created_at' => '2017-07-29 16:21:48',
                'updated_at' => '2017-07-29 16:21:48',
            ),
        ));
        
        
    }
}