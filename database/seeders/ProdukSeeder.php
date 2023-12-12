<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ProdukSeeder extends Seeder
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
            DB::table('produk')->insert([
                'nama'=>$faker->name,
                'detail'=>$faker->address,
                'status'=>'N'
            ]);
        }
    }
}
