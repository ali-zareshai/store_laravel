<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function showOrder($bill){
        $order = Order::with(['product'])->where('bill_id',$bill)->get();
        return $order;
    }

    public function storeOrder($bill){
        Order::create([
            'bill_id'=>$bill,
            'product_id'=>$this->request->product_id,
            'price'=>$this->request->price,
            'amount'=>$this->request->amount,
            'discount'=>$this->request->discount
        ]);

        return response()->json([
            'data' => 'سفارش شما با موفقیت ایجاد شد'
        ], 201);
    }

    public function updateProduct($bill,$product){
        Order::where('bill_id',$bill)
            ->where('product_id',$product)
            ->update($this->request->all());

        return response()->json([
            'data' => 'سفارش شما با موفقیت ابدیت شد'
        ], 200);
    }

    public function deleteProduct($bill,$product){
        Order::where('bill_id',$bill)
            ->where('product_id',$product)
            ->delete();

        return response()->json([
            'data' => 'محصول سفارش شما با موفقیت حذف شد'
        ], 202);

    }

    public function deleteOrder($bill){
        Order::where('bill_id',$bill)->delete();
        return response()->json([
            'data' => ' سفارش شما با موفقیت حذف شد'
        ], 202);
    }
}