<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function index(Request $request){
    
        return response()->json([
            'data'=>User::all(),
            'message'=>'Success'
        ],200);
    }

    public function show(Request $request){

        return response()->json([
            'data'=>$request->user(),
            'message'=>'Success'
        ],200);

    }
}
