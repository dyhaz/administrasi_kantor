<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'su';
        $role_employee->description = 'Superuser';
        $role_employee->save();

        $role_employee = new Role();
        $role_employee->name = 'ka_upt';
        $role_employee->description = 'KA UPT';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'ka_subbag_tu';
        $role_manager->description = 'KA Subbag TU';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'staf_subbag_tu';
        $role_manager->description = 'Staf Subbag TU';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'ka_seksi_pengujian_dan_pengendalian_mutu';
        $role_manager->description = 'KA Seksi Pengujian dan Pengendalian Mutu';
        $role_manager->save();

        $role_manager = new Role();
        $role_manager->name = 'staf_seksi_pengujian_dan_pengendalian_mutu';
        $role_manager->description = 'Staf Seksi Pengujian dan Pengendalian Mutu';
        $role_manager->save();
    }
}
