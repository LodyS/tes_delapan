<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superadministrator',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin-wilayah-satu',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin-wilayah-dua',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin-wilayah-tiga',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin-wilayah-empat',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin-wilayah-lima',
            'guard_name' => 'web'
        ]);
    }
}
