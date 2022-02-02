<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\Models\Post;
  use App\Models\User;

class PostController extends Controller
{
   public function index() {
       
    $Posts = Post::simplePaginate(4);
    // $Posts=Post::all();
    // $allPosts=Post::where('title','first post')->get();

       //return view('posts/index',[ or
        return view('posts.index',[
            'Posts' => $Posts,
        ]);
    }

    public function create() {

        $Users=User::all();
      //  @dd($users);
        return view('posts.create',
          ['Users' =>$Users]);
       

    }


    public function store() {
       
        $data=request()->all();
        //  @dd($data);
        // Post::create( $data);

        Post::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator'],
           
        ]); 
      return redirect()->route('posts.index');
    }


    public function show($postId) {
      //  echo  $postId;
    //   @dd($postId);
        $PostInfo=Post::find($postId);
        // @dd($Posts[$postId]);
        // $PostInfo=$Posts[$postId];
        // @dd($UserInfo);

        ///////////////////////////
       

        return view('posts.show',['PostInfo' =>$PostInfo]);
     }
 




     public function destroy($postId) {
        Post::where('id', $postId)->delete();
        return redirect()->route('posts.index');
    }
 
    

      




    public function edit($postId) { // query in db select * from posts where id = $postId // then fill the fields with retrived data
         $Post = Post::where('id', $postId)->get()->first(); 
         $Users = User::all();
          return view('posts.edit', [ 'Post' => $Post, 'Users' => $Users ]);
         }
     public function update($postId) {
       
        $data=request()->all();
    
        Post::
        where('id', $postId)
        ->update(['title' => $data['title'],
            'description'=>$data['description'],

            'user_id' => $data['post_creator']]);
  
      return redirect()->route('posts.show',$postId);

     }
 

}