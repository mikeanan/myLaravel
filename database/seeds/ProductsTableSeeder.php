<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake_data = Faker\Factory::create();

        DB::table("products")->insert(
            [
                "name" => $fake_data->name,
                "comments" => $fake_data->realText($maxNbChars = 200, $indexSize = 2),
                "rate" => rand(1,5),
                "product_date" => date("Y-M-D"),
            ]
        );
    }
}
