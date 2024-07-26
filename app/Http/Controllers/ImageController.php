<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
     //define the index method to detrime the View or return View

    public function index(){

          return View("upload");
    }

    public function indexT(Request $request){

        $request->file('image')->storeAs('/images', 'DoneUpload.jpg') ;

    }
}



