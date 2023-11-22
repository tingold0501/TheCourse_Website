<?php

namespace App\Http\Controllers;

use App\Models\UserRoleM;
use App\Models\UserM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class USerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = UserRoleM::where('status',1)->select('id','name',)->get();
        return view("user.user",compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'idRole' => 'required|exists:role_tbl,id',
            
        ],[
            'name.required'=>'Thiếu tên tài khoản',
            'email.email'=>'Email không hợp lệ',
            'email.required'=>'Thiếu email tài khoản',
            'email.unique'=>'Email bị trùng',
            'idRole.required'=>'Mã loại không hợp lệ',
            'idRole.exists'=>'Mã loại không tồn tại'
        ]);
        if ($validator->fails()) {
            return response()->json(['check'=>false,'msg'=> $validator->errors()]);
        }
        $password = random_int(10000,99999);
        $hash = Hash::make($password);
        UserM::create(['name'=>$request->name, 'email'=>$request->email,'idRole'=>$request->idRole, 'password'=>$request->$hash]);
        $mailData=[
            'title'=>'Hello'
        ];
        Mail::to($request->email)->send(new UserMail($mailData));
        return response()->json(['check'=>true,'msg'=> 'Đăng ký thành công']);
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
    public function update(Request $request, UserM $userM)
    {
        //
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
