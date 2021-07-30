<?php

use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $attrs=[
            ['name'=>'ولت','label'=>'volet','value'=>"4"],
            ['name'=>'رنگ','label'=>'color','value'=>"سبز"],
            ['name'=>'جنس','label'=>'jens','value'=>"فلزی"],
            ['name'=>'سایز','label'=>'size','value'=>"5.2"],
            ['name'=>'جنس بدنه','label'=>'jensbody','value'=>"فلزی تمام"],
        ];

        foreach ($attrs as $attr){
            $atribute=factory(App\Attribute::class)->make([
                'name'=>$attr['name'],
                'label'=>$attr['label'],
                'value'=>$attr['value'],
            ]);
            $atribute->save();

        }
    }



}
