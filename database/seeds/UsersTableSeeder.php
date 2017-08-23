<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        $user = new User();
        $user->name = 'superuser';
        $user->email = 'superuser@website.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach('1');

        $user = new User();
        $user->name = 'KA UPT';
        $user->email = 'kaupt@website.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach('2');

        $user = new User();
        $user->name = 'KA SUBBAG TU';
        $user->email = 'kasubbagtu@website.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach('3');

        $user = new User();
        $user->name = 'STAF SUBBAG TU';
        $user->email = 'stafsubbagtu@website.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach('4');

        $user = new User();
        $user->name = 'KA SEKSI PENGUJIAN DAN PENGENDALIAN MUTU';
        $user->email = 'kaseksipengujiandanpengendalianmutu@website.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach('5');

        $user = new User();
        $user->name = 'STAF SEKSI PENGUJIAN DAN PENGENDALIAN MUTU';
        $user->email = 'stafseksipengujiandanpengendalianmutu@website.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach('6');
    }
}
