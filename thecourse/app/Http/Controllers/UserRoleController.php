<?php

namespace App\Http\Controllers;

use App\Models\UserRoleM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = UserRoleM::all();
        return view("user.roles",compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'roleName' => 'required|unique:role_tbl,name',
            
        ],[
            'roleName.required'=>'Thiếu tên loại tài khoản',
            'roleName.unique'=>'Loại Tài Khoản Đã Tồn Tại',
        ]);
        if ($validator->fails()) {
            return response()->json(['check'=>false,'msg'=> $validator->errors()]);
        }
        UserRoleM::create(['name'=>$request->roleName]);
        return response()->json(['check'=>true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserM  $userM
     * @return \Illuminate\Http\Response
     */
    public function show(UserM $userM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserM  $userM
     * @return \Illuminate\Http\Response
     */
    public function edit(UserM $userM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserM  $userM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRoleM $userRoleM)
    {
        $validator = Validator::make($request->all(), [
            'id'=>'required|exists:role_tbl,id',
            'roleName' => 'required|unique:role_tbl,name',
            
        ],[
            'roleName.required'=>'Thiếu tên loại tài khoản',
            'roleName.unique'=>'Loại Tài Khoản Đã Tồn Tại',
            'id.required'=> 'Thiếu mã loại tài khoản',
            'id.exists'=> 'Mã loại không tồn tại',
        ]);
        if ($validator->fails()) {
            return response()->json(['check'=>false,'msg'=> $validator->errors()]);
        }
        UserRoleM::where('id',$request->id)->update(['name'=> $request->roleName]);
        return response()->json(['check'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserM  $userM
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserM $userM)
    {
        //
    }
}
