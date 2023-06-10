<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public function planif(){

        $users=auth()->user();
        DB::insert("insert into planif values(? , ?  ,  ,)" , []);

        return response()->json(["msg"=>$users]);
    }





}


