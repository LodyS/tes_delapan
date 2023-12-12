<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i<=10; $i++ )
        {
            DB::table('employees')->insert([
                'first_name'=>$faker->name,
                'last_name'=>$faker->name,
                'job_id'=>random_int(1,10),
            ]);
        }
    }
}
