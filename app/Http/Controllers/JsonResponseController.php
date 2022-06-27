<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonResponseController extends Controller
{
    public static function ok($results){
        $array = array(
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
