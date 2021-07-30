<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\Api\V1\RoleCollection;
use App\Http\Resources\Api\V1\RoleResource;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();
        return response()->json([
            'data'=>new RoleCollection($roles),
            'message'=>'داده یافت شد '
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $user=User::find($request->user_id);

        $role=$user->roles()->create([
            'label'=>$request->label,
            'name'=>$request->name
        ]);


        return  $role ? response()->json('نقش شما با موفقیت اعمال شد',201) : response()->json('مشکل در عملیات رخ داده است .',500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role=Role::find($id);
        return response()->json([
           'data'=>new RoleResource($role),
           'message'=>'نقش مدنظر شما یافت شد .'
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role=Role::find($id);
        dd($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return  Role::findOrFail($id)->delete() ? response()->json('نقش شما با موفقیت حذف شد',201) : response()->json('مشکل در سرور رخ داده است .',500);
    }
}
