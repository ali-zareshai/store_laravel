<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\Api\V1\UserCollection;
use App\Http\Resources\Api\V1\UserResource;
use App\User;
use App\UserRoles;
use JWTAuth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(8);
        return response()->json(new UserCollection($users),200);
    }

    public function show($id)
    {
        $user=User::findOrFail($id);
        return response()->json([
           'data'=>new UserResource($user),
            'message'=>'کاربر دریافت شد',
        ],200);
    }

    public function store(Request $request)
    {
        // return $request;
        $user =User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'mobile'=>$request->mobile,
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'national_code'=>$request->national_code,
            'phone'=>$request->phone,
            'birthday'=>$request->birthday,
            'state'=>$request->state,
            'city'=>$request->city,
            'bank_number'=>$request->bank_number,
            'gender'=>$request->gender,
            'address'=>$request->address
        ]);
        return  response()->json([
            'data'=>$user,
            'message'=>'کاربر با موفقیت افزوده شد'
        ],201);
    }

    public function update(UserUpdateRequest $request,$id)
    {
        $user=User::findOrFail($id);
        $user->update($request->all());
        return response()->json([
            'message'=>'کاربر با موفقیت ابدیت شد'
        ],200);

    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete($id);
        return response()->json([
            'message'=>'کاربر با موفقیت حذف شد'
        ],202);
    }

    public function getUserInfo(Request $request){
        $token =$request->header('Authorization');
        $user= JWTAuth::setToken($token)->toUser();
        return response()->json([
            'data'=>new UserResource($user),
            'message'=>'کاربر دریافت شد',
         ],200);
    }

    public function getUserRoles($id){
        return response()->json([
            'data'=>User::find($id)->roles(),
            'message'=>'نقش های کاربر دریافت شد'
        ],200);
    }

    public function addUserRoles($id,$roleId){
        $userRole =UserRoles::create([
            'user_id'=>$id,
            'role_id'=>$roleId
        ]);

        return response()->json([
            'data'=>$userRole,
            'message'=>'نقش به کاربر اضافه شد'
        ],200);
    }

    public function removeUserRoles($id, $roleId){
        UserRoles::where('user_id',$id)->where('role_id',$roleId)->delete();

        return response()->json([
            'message'=>'نقش  کاربر حذف شد'
        ],200);
    }
}
