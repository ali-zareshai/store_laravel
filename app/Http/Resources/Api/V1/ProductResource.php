<?php

namespace App\Http\Resources\Api\V1;

use App\Category;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'cat_id'=>Category::find($this->cat_id)->name,
            'name'=>$this->name,
            'price'=>$this->priceReal,
            'image'=>$this->image,
            'description'=>$this->description,
            'count'=>$this->count,
            'rate'=>$this->rate,
            'products_label'=>$this->products_label,
            'view_count'=>$this->view_count,
            'sale_count'=>$this->sale_count,
            'child_image_1'=>$this->child_image_1,
            'child_image_2'=>$this->child_image_2,
            'child_image_3'=>$this->child_image_3,
            'child_image_4'=>$this->child_image_4,

            'measuring_range'=>$this->measuring_range,
            'process_temperature'=>$this->process_temperature,
            'process_pressure'=>$this->process_pressure,
            'version'=>$this->version,
            'materials_wetted_part'=>$this->materials_wetted_part,
            'threaded_connection'=>$this->threaded_connection,
            'flange_connection'=>$this->flange_connection,
            'housing_material'=>$this->housing_material,
            'protectionrating'=>$this->protectionrating,
            'output'=>$this->output,
            'ambient_temperature'=>$this->ambient_temperature,
            
            'created_at' => (String)Verta::instance($this->created_at)
        ];
    }
}
