<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createProduct();
    }

    private function createProduct(){
        for ($i=0;$i<=10;$i++){
            $product=factory(\App\Product::class)->make([
                'cat_id'=>rand(1,4),
                'name'=>"محصول شماره $i",
                'price'=>rand(10000,50000),
                'description'=>"توضیحات محصول شماره $i",
                'count'=>rand(1,50),
                'rate'=>rand(1,5),
                'view_count'=>rand(1,10000),
            ]);
            $product->save();
            $this->command->info('create products');
        }
    }

}
