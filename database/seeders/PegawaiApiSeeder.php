<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PegawaiApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i<=800; $i++ )
        {
            DB::table('pegawai_api')->insert([
                'nama'=>$faker->name,
                'tanggal_masuk'=>$faker->dateTimeThisMonth(),
                'total_gaji'=>$faker->numberBetween(4000000,10000000),
            ]);
        }
    }
}
