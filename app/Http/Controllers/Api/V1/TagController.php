<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\TagCollection;
use App\Http\Resources\Api\V1\TagResource;
use App\Tag;
use App\ProductTag;
use Illuminate\Http\Request;

class TagController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index(){
         $tags =Tag::all();
         return response()->json(new TagCollection($tags));
    }

    public function show($id){
        $tag =Tag::findOrFail($id);
        return response()->json([
            'data' => new TagResource($tag),
            'message' => 'تگ یافت شد'
        ], 200);
   }

   public function showProducts($id){
       $products =ProductTag::with(['product'])
            ->where('tag_id',$id);

        if($this->request->has('per-page')){
            $products= $products->paginate($this->request->input('per-page',15))->toArray();
            $products['data']= Collect($products['data'])->pluck('product')->all();
            return $products;
        }
        $products= $products->get()->toArray();
        return Collect($products)->pluck('product')->all();
   }

    public function store(){
        Tag::create([
                'name'=>$this->request->name
            ]   
        );

        return response()->json([
            'data' => 'تگ شما با موفقیت ایجاد شد'
        ], 201);
    }

    public function update($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update([
            'name'=>$this->request->name
        ]);
        return response()->json([
            'data' => 'تگ شما با موفقیت ابدیت شد'
        ], 200);
    }

    public function destroy($id)
    {
        tag::findOrFail($id)->delete();
        return response()->json([
            'data' => 'تگ شما با موفقیت حذف شد'
        ], 202);
    }

    
}