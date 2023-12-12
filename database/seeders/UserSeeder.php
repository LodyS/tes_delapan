<?php

use Illuminate\Database\Seeder;
use App\User;
//use Spatie\Permission\Models\Permission;
//use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Superadministrator',
            'email' => 'superadministrator@gkjkotagede.id',
            'password' => bcrypt('12345678'),
        ]);
        
        //$permissions = Permission::pluck('id','id')->all();
        //$admin->syncPermissions($permissions);
        //$admin->assignRole('superadministrator');

        $wilayahSatu = User::create([
            'name' => 'Wilayah Satu',
            'email' => 'wilayahsatu@gkjkotagede.id',
            'password' => bcrypt('12345678'),
        ]);

        //$permissions = Permission::pluck('id','id')->all();
        //$wilayahSatu->syncPermissions($permissions);
        //$wilayahSatu->assignRole('admin-wilayah-satu');

        $wilayahDua = User::create([
            'name' => 'Wilayah Dua',
            'email' => 'wilayahdua@gkjkotagede.id',
            'password' => bcrypt('12345678'),
        ]);

        //$permissions = Permission::pluck('id','id')->all();
        //$wilayahDua->syncPermissions($permissions);
        //$wilayahDua->assignRole('admin-wilayah-dua');

        $wilayahTiga = User::create([
            'name' => 'Wilayah Tiga',
            'email' => 'wilayahtiga@gkjkotagede.id',
            'password' => bcrypt('12345678'),
        ]);

        //$permissions = Permission::pluck('id','id')->all();
        //$wilayahTiga->syncPermissions($permissions);
        //$wilayahTiga->assignRole('admin-wilayah-tiga');

        $wilayahEmpat = User::create([
            'name' => 'Wilayah Empat',
            'email' => 'wilayahempat@gkjkotagede.id',
            'password' => bcrypt('12345678'),
        ]);

        //$permissions = Permission::pluck('id','id')->all();
        //$wilayahEmpat->syncPermissions($permissions);
        //$wilayahEmpat->assignRole('admin-wilayah-empat');

        $wilayahLima = User::create([
            'name' => 'Wilayah Lima',
            'email' => 'wilayahlima@gkjkotagede.id',
            'password' => bcrypt('12345678'),
        ]);

        //$permissions = Permission::pluck('id','id')->all();
        //$wilayahLima->syncPermissions($permissions);
        //$wilayahLima->assignRole('admin-wilayah-lima');*/
    }
}
