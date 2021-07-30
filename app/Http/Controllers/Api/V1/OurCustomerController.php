<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\OurCustomerCollection;
use App\Http\Resources\Api\V1\OurCustomerResource;
use App\OurCustomers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class OurCustomerController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index()
    {
        $customers =OurCustomers::all();
        return response()->json(new OurCustomerCollection($customers));
    }


    public function show ($id)
    {
        $customer = OurCustomers::findOrFail($id);
        return response()->json([
            'data' => new OurCustomerResource($customer),
            'message' => 'مشتری  یافت شد'
        ], 200);
    }

    public function store()
    {
        OurCustomers::create([
            'name' => $this->request->name,
            'image' => $this->uploadImage(),
            'url' => $this->request->url,
        ]);

        return response()->json([
            'data' => 'مشتری  شما با موفقیت ایجاد شد'
        ], 201);
    }
    public function update($id)
    {
        $banner = OurCustomers::findOrFail($id);
        $banner->update($this->request->all());
        return response()->json([
            'data' => 'مشتری  شما با موفقیت ابدیت شد'
        ], 200);
    }
    public function destroy($id)
    {
        OurCustomers::findOrFail($id)->delete();
        return response()->json([
            'data' => 'مشتری  شما با موفقیت حذف شد'
        ], 202);
    }

    protected function uploadImage()
    {
        if($this->request->hasFile('image')){
            $fileName =Str::random(9).'.'.$this->request->image->extension();
            $this->request->image->move(public_path('uploads/customers'), $fileName);
            return $fileName;
        }else{
            return null;
        }
    }

}