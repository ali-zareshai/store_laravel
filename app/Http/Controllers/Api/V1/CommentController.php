<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\CommentCollection;
use App\Http\Resources\Api\V1\CommentResource;
use App\comment;
use Illuminate\Http\Request;

class CommentController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function showComments($id){
        $comments =Comment::where('status',$this->request->input('status',1))->get();
        return response()->json(new CommentCollection($comments), 200); 
    }

    public function showComment($id,$commentId){
        $comment =Comment::find($commentId);
        return response()->json([
            'data' => new CommentResource($comment),
            'message' => 'نظر یافت شد'
        ], 200);
    }

    public function addComment($id){
        Comment::create([
            'product_id'=>$id,
            'score'=>$this->request->score,
            'user_name'=>$this->request->user_name,
            'user_email'=>$this->request->user_email,
            'title'=>$this->request->title,
            'text'=>$this->request->text,
        ]);

        return response()->json([
            'data' => 'نظر شما با موفقیت ثبت شد'
        ], 201);
    }

    public function updateComment($id,$commentId){
        Comment::where('id',$commentId)->update($this->request->all());

        return response()->json([
            'data' => ' نظر با موفقیت ابدیت شد'
        ], 200);
    }

    public function deleteComment($id,$commentId){
        Comment::findOrFail($commentId)->delete();
        return response()->json([
            'data' => ' نظر با موفقیت حذف شد'
        ], 202);
    }
}