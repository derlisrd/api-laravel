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
        $fields= (isset($g["fields"]) && !empty($g["fields"]) ) ? explode(",",$g["fields"]) : "*";

        $tablesingular = substr($table,0,-1);
        $orderBy="id_".$tablesingular;



        $include = isset($g['include']) && !empty($g['include'])  ? explode(",",$g['include'])  : null;
        $on = isset($g['on']) && !empty($g['on'])  ? explode(",",$g['on'])  : null;
        $where = isset($g['where']) && !empty($g['where'])  ? explode(",",$g['where']) : null;


        $page = isset($_GET['page']) && !empty($_GET['page'])  ? $_GET['page']  : null;
        $offset = 0; $limiter = 60;
        if(!empty($page['size']) && !empty($page['number'])){
            $offset = intval($page['number']);
        }
        else if(!empty($page['size'])){
            $limiter = intval($page['size']);
        }
        else{
            $limiter =  60;
        }


        $found = DB::table($table)->where($where ? [$where] : null)->count();
        $total = DB::table($table)->count();
        $res = DB::table($table)
        ->select($fields)
        ->where($where ? [$where] : null)
        ->orderBy($orderBy,"asc")
        ->offset($offset)
        ->limit($limiter)
        ->get();


        return JsonResponseController::OkGet($res,$offset,$limiter,$found,$total);
    }

    return JsonResponseController::error("Table not exits");
   }
}
