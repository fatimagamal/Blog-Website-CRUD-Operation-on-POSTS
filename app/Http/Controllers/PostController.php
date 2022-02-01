<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index() {
        $allPosts=[['title'=>'first post','posted_by'=>"fatma",'created_at'=>"2020"],
                   [ 'title'=>'second post','posted_by'=>"ali",'created_at'=>"2021"]];

                //    return view('posts/index',[ or
        return view('posts.index',[
            'allPosts' => $allPosts,
        ]);
    }

    public function create() {
        return view('posts.create');
    }


    public function store() {
       echo  "ddddddddddddd";

      return redirect()->route('posts.index');
    }


    public function show($postId) {
        echo  $postId;

        return view('posts.show');
     }
 
     public function update($postId) {
        echo  $postId;

        return view('posts.update');
     }
 

}