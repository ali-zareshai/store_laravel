<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Bill;
use App\Order;
use App\Product;
use App\Payment as AppPayment;
use Illuminate\Http\Request;

use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class BillController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index(){
        if($this->request->has("status"))
            $bills =Bill::where("status",$this->request->status)->get();
        else
            $bills =Bill::all();
        
        return response()->json($bills);
    }

    public function store(){
        $userId =auth('api')->user()->id;
        $totalPrice =$this->calculTotalprice($this->request->order_list);
        
        $bill =Bill::create([
            'user_id'=>$userId,
            'free_transport'=>$this->request->boolean('free_payment'),
            'payment_method'=>$this->request->payment_method,
            'total_price'=>$totalPrice
        ]);

        $this->saveOrderList($bill->id ,$this->request->order_list);
        
        if($totalPrice!=0 && $this->request->payment_method ==1){
            $paymentId =$this->savePayment($totalPrice,$bill->id);
            $url =$this->getPaymentUrl($totalPrice ,$paymentId);
        }
        
        return response()->json([
            'id'=>$bill->id,
            'data' => 'صورتحساب شما با موفقیت ایجاد شد',
            'url'=>isset($url)?$url:[]
        ], 201);
    }

    private function rialToToman($rial){
        return intVal($rial/10);
    }

    private function getPaymentUrl($totalAmount ,$paymentId){
        $invoice = new Invoice;
        $invoice->amount($this->rialToToman($totalAmount));
        $invoice->detail(['description' => config('app.name')]);

        return Payment::callbackUrl(route('payment.verify'))
            ->purchase(
            $invoice,
            function($driver, $transactionId)use($paymentId){
                AppPayment::where('id',$paymentId)->update([
                    'ref_id'=>$transactionId,
                ]);
            }
        )->pay()->toJson();
        

        return [
            "action"=> "",
            "inputs"=> [],
            "method"=> "GET"
        ];
    }

    private function savePayment($total,$billId){
        $payment =AppPayment::create([
            'user_id'=>auth('api')->user()->id,
            'bill_id'=>$billId,
            'amount'=>$total,
            'ip'=>$this->request->ip()
        ]);
        return $payment->id;
    }

    private function calculTotalprice($orderList){
        $total =0;
        if(!empty($orderList)){
            $orders =json_decode($orderList);
            foreach($orders as $order){
                $order =(array)$order;
                $product =Product::where('id',$order['product_id'])->first()->toArray();
                if(!empty($product)){
                    $price =intval(intVal($product['price']) * $order['amount']);
                    $total +=$price;
                }
            }
        }

        return (int)$total;
    }

    public function paymentResult(){
        $invoice =AppPayment::where('ref_id',$this->request->Authority)->first();
        if($this->request->Status =='OK'){
            if($invoice){
                try {
                    $receipt = Payment::amount($this->rialToToman($invoice->amount))->transactionId($invoice->ref_id)->verify();
                    $trackingCode =$receipt->getReferenceId();
                    AppPayment::where('ref_id',$this->request->Authority)->update([
                        'status'=>1,
                        'tracking_code'=>$trackingCode,
                        'payment_at'=>now(),
                    ]);

                    Bill::where('id',$invoice->bill_id)->update([
                        'status'=>2//success payment
                    ]);

                    return $this->resultView(true ,$invoice,$trackingCode);
                } catch (InvalidPaymentException $exception) {
                    AppPayment::where('ref_id',$this->request->Authority)->update([
                        'message'=>$exception->getMessage()
                    ]);
                    Bill::where('id',$invoice->bill_id)->update([
                        'status'=>1//fail payment
                    ]);
                    return $this->resultView(false ,$invoice);
                }
            }
        }
        if($invoice){
            AppPayment::where('ref_id',$this->request->Authority)->update([
                'message'=>'پرداخت لغو شد'
            ]);
            return $this->resultView(false ,$invoice);
        }else{
            return abort(404);
        }

    }

    private function resultView($status ,$invoice,$tracking=null){
        if($status){
            return redirect()->to("https://www.adaksanesh.com/shop/order-success?amount=".$invoice->amount."&ref=".$invoice->ref_id."&tracking=".$tracking);
        }else{
            return redirect()->to("https://www.adaksanesh.com/shop/order-fail");
        }
        // $message = [
        //     'state' =>  $status?1:0,
        //     'message'   =>  $status?'پرداخت با موفقیت انجام شد':'خطا در پرداخت',
        //     'amount'    =>  $invoice->amount,
        //     'ref_id'    =>  $invoice->ref_id
        // ];
        // return view('payments.result', compact(['message']));
    }

    private function saveOrderList($billId ,$orderList){
        if(!empty($orderList)){
            $orders =json_decode($orderList);
            foreach($orders as $order){
                $order =(array)$order;
                Order::create([
                    'bill_id'=>$billId,
                    'product_id'=>$order['product_id'],
                    'amount'=>$order['amount'],
                    'price'=>isset($order['price'])?$order['price']:0
                ]);

                $product =Product::find($order['product_id']);
                $product->decrement('count',$order['amount']);
                $product->increment('sale_count',$order['amount']);
            }
        }
        
    }

    public function show($id){
        $bill =Bill::findOrFail($id);
        return response()->json([
            'data' => $bill,
            'message' => 'صورتحساب یافت شد'
        ], 200);
    }


    public function destroy($id){
        Bill::findOrFail($id)->delete();
        return response()->json([
            'data' => 'صورتحساب شما با موفقیت حذف شد'
        ], 202);
    }

    
}
