<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\DiscountCollection;
use App\Http\Resources\Api\V1\DiscountResource;
use App\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index(){
        $discounts =Discount::with(['product'])->get();
        return $discounts->map(function($item){
            return [
                'id'=>$item->product_id,
                'image'=>$item->product->image,
                'price'=>$item->product->price,
                'price_discount'=>$item->price_discount,
                'count'=>$item->product->count
            ];
        });
   }

   public function store(){
    Discount::updateOrCreate(
        ['product_id'=>$this->request->id],
        ['price_discount'=>$this->request->price_discount]
    );

    return response()->json([
        'data' => 'تخفیف شما با موفقیت ایجاد شد'
    ], 201);

   }

    public function destroy($id){
        Discount::where('product_id',$id)->delete();

        return response()->json([
            'data' => 'تخفیف شما با موفقیت حذف شد'
        ], 202);
    }

}