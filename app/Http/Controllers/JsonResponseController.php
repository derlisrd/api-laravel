<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class JsonResponseController extends Controller
{
    public static function OkGet($results,$pagenumber,$limit,$found,$total){

        $get = request()->all();

        $urlnext = URL::current();
        $array = array(
            "next"=>$urlnext,
            "pagenumber"=>$pagenumber,
            "limit"=>$limit,
            "found"=>$found,
            "total"=>$total,
            "response"=>"ok",
            "results"=>$results,
            "error"=>false,
            "messages"=>null
        );
        return response()->json($array);
    }

    public static function error($error){
        return response()->json(['message' => $error],404);
    }
}
