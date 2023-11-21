<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReactAPIController extends Controller
{
    public function getDataReact(){
        return response()->json(['data' => 'Hello from Laravel']);
    }
}
