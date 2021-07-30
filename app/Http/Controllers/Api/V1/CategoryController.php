<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\ProductCollection;
use App\Category;
use App\CatSubCategory;
use App\Product;
use App\ProductCategory;

class CategoryController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function index()
    {
        if($this->request->filled('subcat')){
            $categorys= CatSubCategory::with(['category'])
                ->where('subcat_id',$this->request->subcat)
                ->get()
                ->toArray();
            return collect($categorys)->pluck('category')->all();
        }

        if($this->request->filled('only-cat')){
            if(!$this->request->boolean('only-cat')){
                return response()->json($this->showCatWithSub());
            }
        }
        $categorys =Category::all();
        return response()->json($categorys);
    }

    private function showCatWithSub(){
        $cats= CatSubCategory::with(['category','subCategory'])->get()->toArray();
        $export =array();
        foreach($cats as $cat){
            if(!isset($export[$cat['cat_id']])){
                $export[$cat['cat_id']] =$cat['category'];
                $export[$cat['cat_id']]['items'] =array();
            }

            array_push($export[$cat['cat_id']]['items'],$cat['sub_category']);
        }
        return array_values($export);
    }


    public function show ($id)
    {
        $category= CatSubCategory::with(['subCategory'])
                ->where('cat_id',$id)
                ->get()
                ->toArray();
        return response()->json([
            'data' => \collect($category)->pluck('sub_category')->all(),
            'message' => 'دسته بندی یافت شد'
        ], 200);
    }

    public function store()
    {
        Category::create([
            'name' => $this->request->name,
            'label' => $this->request->label
        ]);

        return response()->json([
            'data' => 'دسته بندی شما با موفقیت ایجاد شد'
        ], 201);
    }
    public function update($id)
    {
        $category = Category::findOrFail($id);
        $category->update($this->request->all());
        return response()->json([
            'data' => 'دسته بندی شما با موفقیت ابدیت شد'
        ], 200);
    }
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response()->json([
            'data' => 'دسته بندی شما با موفقیت حذف شد'
        ], 202);
    }

    public function showProductsCategory($id){
        $products= ProductCategory::with(['product'])
            ->where('category_id',$id)
            ->where('is_category',true);

        if($this->request->filled('per-page'))
            return $products->paginate($this->request->input('per-page',15));
        
        return $products->get();
    }

    public function showProductsSubCategory($id){
        $products= ProductCategory::with(['product'])
            ->where('category_id',$id)
            ->where('is_category',false);

        if($this->request->filled('per-page'))
            return $products->paginate($this->request->input('per-page',15));
        
        return $products->get();
    }

    public function addProducts($id){
        Product::where('id',$this->request->product_id)
            ->update(['cat_id'=>$id]);

        return response()->json([
            'data' => ' محصول شما با موفقیت دسته بندی شد'
        ], 200);
    }



}