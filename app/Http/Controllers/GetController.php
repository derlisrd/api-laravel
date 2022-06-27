<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GetController extends Controller
{
   public function show($table){

    if (Schema::hasTable($table)) {

        $g = $_GET;
        $fields= (isset($g["fields"]) && !empty($g["fields"]) ) ? explode(",",$g["fields"]) : null;

        $tablesingular = substr($table,0,-1);
        $orderBy="id_".$tablesingular;

        $include = isset($g['include']) && !empty($g['include'])  ? explode(",",$g['include'])  : null;
        $on = isset($g['on']) && !empty($g['on'])  ? explode(",",$g['on'])  : null;
        $where = isset($g['where']) && !empty($g['where'])  ? explode(",",$g['where']) : null;


        $res = DB::table($table)
        ->select($fields)
        ->where($where ? [$where] : null)
        ->orderBy($orderBy,"asc")
        ->get();


        return JsonResponseController::ok($res);
    }

    return JsonResponseController::error("Table not exits");
   }
}
