<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $posts = Post::paginate(3) ;

         return view("index", compact('posts')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories = Category::all() ;
        return view("create" ,compact('categories')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $request->validate([

         'image' => ['required' ,'max:2550' ,'image'] ,
         'title' => ['required' ,'max:256'] ,
         'category_id' => ['required' ,'integer'] ,
         'description' =>['required']
       ]) ;

      $post = new Post() ;
       $fileName = time().'_'.$request->image->getClientOriginalName();
       $filePath = $request->image->storeAs('uploads',$fileName );
       $post->title = $request->title ;
       $post->description = $request->description ;
       $post->category_id = $request->category_id ;
       $post->image = $filePath;
       $post->save() ;

       return redirect()->route('posts.index') ;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::findOrFail($id);

        return View('show' , compact('post')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id) ;
        return View('edit' , compact('post' ,'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


       $post = Post::findOrFail($id);

        // dd(public_path("storage\\".$post->image) );

        $request->validate([

            'title' => ['required' ,'max:256'] ,
            'category' => ['required' ,'integer']

          ]) ;

          if($request->hasFile('image')){

            $request->validate([

                 'image' => ['required' , 'image' , 'max:2550']
            ]);

            File::delete(public_path("storage/".$post->image)) ;

            // store the image if its replaced
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads',$fileName );
            $post->image = $filePath;
          }

     // define the valus

          $title = $request->title ;
          $category = $request->category;
          $desc = $request->description ;





          // assign the values
          $post->title = $title;
          $post->category_id = $category ;
          $post->description = $desc ;
          $post->save() ;

          return redirect()->route('posts.index') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $post = Post::findOrFail($id) ;

        // dont forget to delte the image from storeg

         $post->delete();

         return redirect()->route('posts.index') ;

    }

    // Trashed all Posts from database and show it

     public function trashed(){

      $posts = Post::onlyTrashed()->get();
     return view("trashed" , compact('posts')) ;
         dd("Binding route with method is done") ;

     }

     //defien an method to restore softed delete ;

     public function restore($id){

       $post = Post::onlyTrashed()->findOrFail($id) ;
       $post->restore() ;
       return redirect()->back();

     }

     //define force_destroy

     public function force_destroy($id){

       $post = Post::onlyTrashed()->findOrFail($id) ;

    //    delete the image form storge
    File::delete(public_path($post->image)) ;

       $post->forceDelete();
       return redirect()->back() ;
     }


    }

