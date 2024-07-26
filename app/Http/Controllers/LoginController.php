<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    //index method

    public function index(){


        return view('login') ;
    }


    // define the Process of login

    public function handelLogin(Request $request){

    //    $request->validate(

    //    [
    //     'email' => 'max:6', // Ensure the field is required, valid email, and at least 6 characters long
    //     'password' => 'max:20'
    //    ]
    //    ) ;

    // check if any syntax is true or not  using validation

    // if any syantax apper you should to show alert
    // if no syntax rule check if the account is exists or not
    // if exist redirect to main page if not show allert

    $request->validate([

        'email' =>'max:6' ,
        'password' =>'max:20|min:3'
    ]) ;


    }
}
