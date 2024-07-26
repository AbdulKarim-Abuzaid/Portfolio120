<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // get all records from the table.
       $posts = DB::table('posts')->get() ;

       // get spesific colum form table
       $titls =     DB::table('posts')->pluck('title');

    //    get some records based condetien

    $postId = DB::table('posts')->where('id' , '>' ,10)
    ->get();

    // make a search using query builder 
    $search = DB::table('posts')->where('body' , 'like' , '%' . "fY6o0alRS".'%' )->get() ;


       return $search ;

            // return view('home' , compact('blogs')) ;

    }
}
