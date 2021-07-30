<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\BannerCollection;
use App\Http\Resources\Api\V1\BannerResource;
use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class BannerController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index()
    {
        $banners =Banner::all();
        return response()->json(new BannerCollection($banners));
    }


    public function show ($id)
    {
        $banner = Banner::findOrFail($id);
        return response()->json([
            'data' => new BannerResource($banner),
            'message' => 'بنر یافت شد'
        ], 200);
    }

    public function store()
    {
        $banner =banner::create([
            'name' => $this->request->name,
            'text' => $this->request->text,
            'image' => $this->uploadImage(),
            'url' => $this->request->url,
        ]);

        return response()->json([
            'message' => 'بنر شما با موفقیت ایجاد شد',
            'data' => $banner
        ], 201);
    }
    public function update($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->update([
            'name' => $this->request->name,
            'text' => $this->request->text,
            'image' => $this->uploadImage(),
            'url' => $this->request->url,
        ]);
        return response()->json([
            'message' => 'بنر شما با موفقیت ابدیت شد',
            'data' => Banner::findOrFail($id)
        ], 200);
    }
    public function destroy($id)
    {
        Banner::findOrFail($id)->delete();
        return response()->json([
            'data' => 'بنر شما با موفقیت حذف شد'
        ], 202);
    }

    protected function uploadImage()
    {
        $imageNames =array();
        if($this->request->has('images')){
            $images =json_decode($this->request->images);
            foreach($images as $image){
                $fileName =Str::random(9).'.jpeg';
                List($type,$data) =explode(";",$image);
                List(,$data) = explode(",",$data);
                file_put_contents(public_path("uploads/banner/").$fileName,base64_decode($data));
                $imageNames[] =$fileName;
            }
            
            return $imageNames[0];
        }else{
            return null;
        }
    }


}