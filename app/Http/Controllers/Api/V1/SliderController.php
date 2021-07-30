<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\SliderCollection;
use App\Http\Resources\Api\V1\SliderResource;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return response()->json(new SliderCollection($sliders));
    }


    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        return response()->json([
            'data' => new SliderResource($slider),
            'message' => 'اسلایدر یافت شد'
        ], 200);
    }

    public function store(Request $request)
    {
        $slider = Slider::create([
            'name' => $request->name,
            'text' => $request->text,
            'image' => $this->uploadImage($request),
            'url' => $request->url,
        ]);

        return response()->json([
            'data' => $slider,
            'message' => "اسلایدر با موفقیت ثبت شد"
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->update($request->all());
        return response()->json([
            'data' => $slider,
            'message' => 'اسلایدر شما با موفقیت ابدیت شد'
        ], 200);
    }
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return response()->json([
            'data' => 'اسلایدر شما با موفقیت حذف شد'
        ], 202);
    }

    protected function uploadImage($request)
    {
        if ($request->hasFile('image')) {
            $fileName = Str::random(9) . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/slider'), $fileName);
            return $fileName;
        } else {
            return null;
        }
    }
}
