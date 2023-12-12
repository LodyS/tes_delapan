<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'edit jemaat']);
        Permission::create(['name' => 'delete jemaat']);
        Permission::create(['name' => 'read jemaat']);
        Permission::create(['name' => 'create jemaat']);

        Permission::create(['name' => 'edit pekerjaan']);
        Permission::create(['name' => 'delete pekerjaan']);
        Permission::create(['name' => 'read pekerjaan']);
        Permission::create(['name' => 'create pekerjaan']);

        Permission::create(['name' => 'edit gereja']);
        Permission::create(['name' => 'delete gereja']);
        Permission::create(['name' => 'read gereja']);
        Permission::create(['name' => 'create gereja']);

        Permission::create(['name' => 'edit babtis']);
        Permission::create(['name' => 'delete babtis']);
        Permission::create(['name' => 'read babtis']);
        Permission::create(['name' => 'create babtis']);

        Permission::create(['name' => 'edit pernikahan']);
        Permission::create(['name' => 'delete pernikahan']);
        Permission::create(['name' => 'read pernikahan']);
        Permission::create(['name' => 'create pernikahan']);

        Permission::create(['name' => 'edit usaha']);
        Permission::create(['name' => 'delete usaha']);
        Permission::create(['name' => 'read usaha']);
        Permission::create(['name' => 'create usaha']);

        Permission::create(['name' => 'edit pendidikan']);
        Permission::create(['name' => 'delete pendidikan']);
        Permission::create(['name' => 'read pendidikan']);
        Permission::create(['name' => 'create pendidikan']);

        Permission::create(['name' => 'edit meninggal']);
        Permission::create(['name' => 'delete meninggal']);
        Permission::create(['name' => 'read meninggal']);
        Permission::create(['name' => 'create meninggal']);

        Permission::create(['name' => 'edit atestasi']);
        Permission::create(['name' => 'delete atestasi']);
        Permission::create(['name' => 'read atestasi']);
        Permission::create(['name' => 'create atestasi']);

        Permission::create(['name' => 'edit perjamuan kudus']);
        Permission::create(['name' => 'delete perjamuan kudus']);
        Permission::create(['name' => 'read perjamuan kudus']);
        Permission::create(['name' => 'create perjamuan kudus']);
    }
}
