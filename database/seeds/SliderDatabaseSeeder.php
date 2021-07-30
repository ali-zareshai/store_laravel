<?php

use Illuminate\Database\Seeder;

class SliderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<=4;$i++){
            $slider=factory(\App\Slider::class)->make([
                'name'=>"اسلایدر شماره $i",
                'text'=>"توضیحات اسلایدر شماره $i",

            ]);

            $slider->save();
            $this->command->info('create slider');
        }
    }


}
