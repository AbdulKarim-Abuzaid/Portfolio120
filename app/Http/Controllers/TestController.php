<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test ;

class TestController extends Controller
{
    function all(){

        $test = Test::all();
        return $test ;
    }
}
