<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function uploadImage($request)
    {
        $imageNames = array();
        if ($request->has('images')) {
            $images = json_decode($request->images);
            foreach ($images as $image) {
                $fileName = Str::random(9) . '.jpeg';
                list($type, $data) = explode(";", $image);
                list(, $data) = explode(",", $data);
                file_put_contents(public_path("uploads/news/") . $fileName, base64_decode($data));
                $imageNames[] = $fileName;
            }

            return $imageNames;
        } else {
            return $imageNames;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $count = $request->get('count', null);

        $news =  News::with([])->ofCount($count)
            ->orderBy('created_at', 'DESC')
            ->get();;
        return response()->json($news, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->request->only('title', 'description');

        $imageNames = $this->uploadImage($this->request);


        $news = News::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => isset($imageNames[0]) ? $imageNames[0] : null,
            'child_image_1' => isset($imageNames[1]) ? $imageNames[1] : null,
            'child_image_2' => isset($imageNames[2]) ? $imageNames[2] : null,
            'child_image_3' => isset($imageNames[3]) ? $imageNames[3] : null,
            'child_image_4' => isset($imageNames[4]) ? $imageNames[4] : null,
        ]);
        return response()->json([
            'data' => $news,
            'message' => "با موفقیت ثبت شد"
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     dd("salam");
    // }s

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return response()->json([
            'data' => $news,
            'message' => 'دسته بندی یافت شد'
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $imageNames = $this->uploadImage($request);
        $response = $news->update([
            'title' => $request->title,
            'description' => $request->title,
            'image' => isset($imageNames[0]) ? $imageNames[0] : null,
            'child_image_1' => isset($imageNames[1]) ? $imageNames[1] : null,
            'child_image_2' => isset($imageNames[2]) ? $imageNames[2] : null,
            'child_image_3' => isset($imageNames[3]) ? $imageNames[3] : null,
            'child_image_4' => isset($imageNames[4]) ? $imageNames[4] : null,
        ]);
        return response()->json([
            'message' => 'اخبار شما با موفقیت ابدیت شد',
            'data' => News::findOrFail($id)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return response()->json([
            'data' => 'اخبار شما با موفقیت حذف شد'
        ], 202);
    }
}
