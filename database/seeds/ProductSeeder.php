<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = array(
            array(
                'title' => 'Shoes',
                'price' => '11200',
                'product_code' => '200',
            ),
            array(
                'title' => 'shirt',
                'price' => '8000',
                'product_code' => '900',
            ),

            array(
                'title' => 'Shoes',
                'price' => '1234',
                'product_code' => '400',
            ),
        );
            DB::table('shops')->insert($product);
    }
}
