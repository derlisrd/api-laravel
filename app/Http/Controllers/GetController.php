<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetController extends Controller
{
   public function show($table){

    $fields = isset($_GET['fields']);
    echo $fields;
   }
}
