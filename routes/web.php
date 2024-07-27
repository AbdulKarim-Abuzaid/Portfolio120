<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ImageController ;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// dashpord & profile route



// the entery point of the Application
Route::get('/', [LoginController::class , 'index']);

// Route::get('/home', HomeController::class  );

Route::get('about' , [AboutController::class , 'index'])->name('about') ;

Route::get('/contact' , [ContactController::class , 'index']) ;

// define the Route for Login page
Route::get("/login" , [LoginController::class , 'index'])->name('login') ;
Route::post("/login" , [LoginController::class , 'handelLogin'])->name('handelLogin') ;

// define a resourse post
Route::resource('posts', PostController::class);


Route::fallback(function(){
return "This request Has not be Hadiling " ;
}) ;

Route::get("/upload" ,[ImageController::class , "index"])->name("upload-file") ;
Route::post("/upload" ,[ImageController::class , "indexT"])->name("store-file");


// make some revitinot to Routing

Route::prefix('test')->group(function() {

Route::get("/all" ,[TestController::class , 'all']);

});

Route::get("/post/trashed" , [PostController::class , 'trashed'])->name("posts.trashed") ;
Route::get("post/restore/{post} ", [PostController::class , "restore"])->name("posts.restore") ;
Route::delete("post/force_delete/{post}" , [PostController::class , 'force_destroy'])->name("posts.force_destroy") ;

// define unavalible route

Route::get("/unavailable" , function(){
    return view('unavailable') ;
})->name('unavailable') ;

//  create a Route Group this mean that some middleware apply on it denote how we can do it

Route::group(["middleware" => "AuthCheck"] ,function(){

    Route::get('/dashborad' , function(){


        return view('dashboard') ;
    });

    Route::get('/profile' , function(){

        return view('/profile');
    });


}) ;
