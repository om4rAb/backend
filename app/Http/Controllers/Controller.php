<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    public function index(){
        $users=User::get();
        return response()->json(["msg"=>$users]);
    }

    public function profile(Request $request){
        $users=auth()->user();
        $x=$users->client_pack;

        return response()->json(["Hi"=>"ur good to go" ,"msg"=>$x]);

    }

    
    public function GetPacks(){
        $packs=Pack::get();
        return response()->json(["packs"=>$packs]);
    }

    public function payment(){
        return response()->json(["packs"=>"Your good to go"]);
    }



}


