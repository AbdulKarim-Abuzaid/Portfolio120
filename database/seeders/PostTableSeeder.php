<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0 ; $i<20 ; $i++){

        DB::table('posts')->insert([

            'title'=>Str::random(20) ,
            'descri'=>Str::random(150) ,

         ]) ;

       } ;
    }
}
