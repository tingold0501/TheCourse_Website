<?php

namespace App\Http\Controllers;

use App\Models\UserM;
use Illuminate\Http\Request;

class USerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
