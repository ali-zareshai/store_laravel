<?php

namespace App\Http\Controllers\Api\V1;

use App\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\AtrributeResource;
use App\Http\Resources\Api\V1\AtrributeCollection;

class AtrributeController extends Controller
{
    public function index(){
        $attrs=Attribute::all();
        return response()->json(new AtrributeCollection($attrs));
    }

    public function show($id)
    {
        $attrs = Attribute::findOrFail($id);
        return response()->json([
            'data' => new AtrributeResource($attrs),
            'message' => 'ویژگی یافت شد'
        ], 200);
    }

    public function store(Request $request)
    {

        Attribute::create([
            'name'=>$request->name,
            'label'=>$request->label,
            'value'=>$request->value,
        ]);

        return response()->json([
            'data' => 'ویزگی با موفقیت ثبت شد'
        ], 201);

    }
}
