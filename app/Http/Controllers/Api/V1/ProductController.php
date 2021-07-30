<?php

namespace App\Http\Controllers\Api\V1;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\Api\V1\ProductCollection;
use App\Http\Resources\Api\V1\ProductResource;
use App\Http\Resources\Api\V1\TagCollection;
use App\Product;
use App\ProductTag;
use App\Tag;
use App\CatSubCategory;
use App\ProductCategory;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products =new Product();
        if($request->has('q')){
            $products =$products->where("name","like","%{$request->q}%");
        }

        if($request->filled('sub-category')){
            $products =$products->where("cat_id",$request->input('sub-category'));
        }

        if($request->filled('category')){
            $subs =CatSubCategory::where('cat_id',$request->input('category'))->get(['subcat_id'])->toArray();
            $products =$products->whereIn("cat_id",$subs);
        }


        if($request->has('tag')){
            $tag =Tag::where('name',$request->tag)->first();
            $productIds =ProductTag::where('tag_id',$tag->id)->pluck('product_id')->toArray();
            $products = $products->whereIn('id',$productIds);
        }
        if($request->has("sort")){
            if ($request->sort == "most-visited")
                $products =$products->orderBy('view_count', 'desc');
            else if($request->sort == "most-Salesed")
                $products =$products->orderBy('sale_count', 'desc');
        }

        if($request->has("per-page"))
            $products = $products->paginate($request->input("per-page"));
        else
            $products = $products->get();
         
        return response()->json($products, 200);

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $product->increment("view_count");
        return response()->json([
            'data' => new ProductResource($product),
            'message' => 'محصول یافت شد'
        ], 200);
    }

    public function store(ProductRequest $request)
    {
        $attrs=[1,2,3,4];
        $category=Category::findOrFail($request->cat_id);
        $imageNames =$this->uploadImage($request);
        $product=$category->products()->create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => isset($imageNames[0])?$imageNames[0]:null,
            'child_image_1' => isset($imageNames[1])?$imageNames[1]:null,
            'child_image_2' => isset($imageNames[2])?$imageNames[2]:null,
            'child_image_3' => isset($imageNames[3])?$imageNames[3]:null,
            'child_image_4' => isset($imageNames[4])?$imageNames[4]:null,

            'measuring_range'=>$request->measuring_range,
            'process_temperature'=>$request->process_temperature,
            'process_pressure'=>$request->process_pressure,
            'version'=>$request->version,
            'materials_wetted_part'=>$request->materials_wetted_part,
            'threaded_connection'=>$request->threaded_connection,
            'flange_connection'=>$request->flange_connection,
            'housing_material'=>$request->housing_material,
            'protectionrating'=>$request->protectionrating,
            'output'=>$request->output,
            'ambient_temperature'=>$request->ambient_temperature,

            'description' => $request->description,
            'count' => $request->count,
            'products_label'=>$request->products_label
        ]);

        // $product->attributes()->sync($attrs);
        return response()->json([
            'data' => [
                'message'=>'محصول شما با موفقیت ایجاد شد',
                'data'=>$product
            ]
        ], 201);
    }


    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $imageNames =$this->uploadImage($request);
        $respone =$product->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'image' => isset($imageNames[0])?$imageNames[0]:null,
                'child_image_1' => isset($imageNames[1])?$imageNames[1]:null,
                'child_image_2' => isset($imageNames[2])?$imageNames[2]:null,
                'child_image_3' => isset($imageNames[3])?$imageNames[3]:null,
                'child_image_4' => isset($imageNames[4])?$imageNames[4]:null,

                'measuring_range'=>$request->measuring_range,
                'process_temperature'=>$request->process_temperature,
                'process_pressure'=>$request->process_pressure,
                'version'=>$request->version,
                'materials_wetted_part'=>$request->materials_wetted_part,
                'threaded_connection'=>$request->threaded_connection,
                'flange_connection'=>$request->flange_connection,
                'housing_material'=>$request->housing_material,
                'protectionrating'=>$request->protectionrating,
                'output'=>$request->output,
                'ambient_temperature'=>$request->ambient_temperature,

                'description' => $request->description,
                'count' => $request->count,
                'products_label'=>$request->products_label
            ]
        );
        return response()->json([
            'message' => 'محصول شما با موفقیت ابدیت شد',
            'data'=>Product::findOrFail($id)
        ], 200);
    }


    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json([
            'data' => 'محصول شما با موفقیت حذف شد'
        ], 202);
    }

    protected function uploadImage($request)
    {
        $imageNames =array();
        if($request->has('images')){
            $images =json_decode($request->images);
            foreach($images as $image){
                $fileName =Str::random(9).'.jpeg';
                List($type,$data) =explode(";",$image);
                List(,$data) = explode(",",$data);
                file_put_contents(public_path("uploads/product/").$fileName,base64_decode($data));
                $imageNames[] =$fileName;
            }
            
            return $imageNames;
        }else{
            return $imageNames;
        }
    }

    ///////////////////////////////////////////
    public function addCategory($productId,$id){
        ProductCategory::create([
            'product_id'=>$productId,
            'category_id'=>$id,
            'is_category'=>true
        ]);

        return response()->json([
            'data' => 'با موفقیت اضافه شد'
        ], 201);
    }

    public function deleteCategory($productId,$id){
        ProductCategory::where(['product_id'=>$productId,'category_id'=>$id,'is_category'=>true])->delete();

        return response()->json([
            'data' => 'با موفقیت حذف شد'
        ], 202);
    }
    ///////////////////
    public function addSubCategory($productId,$id){
        ProductCategory::create([
            'product_id'=>$productId,
            'category_id'=>$id,
            'is_category'=>false
        ]);

        return response()->json([
            'data' => 'با موفقیت اضافه شد'
        ], 201);
    }

    public function deleteSubCategory($productId,$id){
        ProductCategory::where(['product_id'=>$productId,'category_id'=>$id,'is_category'=>false])->delete();

        return response()->json([
            'data' => 'با موفقیت حذف شد'
        ], 202);
    }
    ///////////////////////////////////////////////////////////

    public function latest()
    {
        $products=Product::take(6)->latest()->get();
        return response()->json(new ProductCollection($products), 200);
    }

    public function addTag($productId,$tagId){
        ProductTag::create([
            'product_id'=>$productId,
            'tag_id'=>$tagId
        ]);

        return response()->json([
            'data' => 'تگ شما با موفقیت اضافه شد'
        ], 201);
    }

    public function deleteTag($productId,$tagId){
        ProductTag::where('product_id',$productId)->where('tag_id',$tagId)->delete();
        return response()->json([
            'data' => 'تگ ما با موفقیت حذف شد'
        ], 202);
    }
    public function showTags($id){
        $product = Product::findOrFail($id)->first();
        $tagIds =ProductTag::where('product_id',$product->id)->pluck('tag_id')->toArray();
        $tags =Tag::whereIn('id',$tagIds)->get();
        return response()->json(new TagCollection($tags));
    }

    public function showConfigs($id){
        $product = Product::findOrFail($id)->first();
        return response()->json($product->options);
    }

    public function addConfigs($id,Request $request){
        $configArray =array();
        foreach($request->all() as $key=>$value){
            $configArray[$key]=$value;
        }
        Product::where('id',$id)->update([
            'options'=>json_encode($configArray)
        ]);

        return response()->json([
            'data' => 'کانفیگ شما با موفقیت اضافه شد'
        ], 201);
    }

    public function updateConfigs(Request $request, $id){
        foreach($request->all() as $key=>$value){
            DB::table('products')->update(["options->$key" => $value]);
        }

        return response()->json([
            'data' => 'کانفیگ شما با موفقیت ابدیت شد'
        ], 200);
    }

    public function deleteConfig($id){
        $product = Product::findOrFail($id);
        $product->options =null;
        $product->save();

        return response()->json([
            'data' => 'کانفیگ شما با موفقیت حذف شد'
        ], 202);
    }
}
