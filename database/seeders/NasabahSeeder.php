<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i<10; $i++){
            DB::table('nasabah')->insert([
                'nama_nasabah'=>$faker->name,
                'alamat_nasabah'=>$faker->address,
                'pekerjaan_nasabah'=>$faker->jobTitle,
                'penghasilan_nasabah'=>$faker->numberBetween(3000000,100000000)
            ]);
        }
    }
}
