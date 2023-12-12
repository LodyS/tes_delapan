<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JobItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i<=10; $i++ )
        {
            DB::table('job')->insert([
                'job_title'=>$faker->JobTitle,
            ]);
        }
    }
}
