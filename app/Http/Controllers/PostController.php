<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
  use App\Models\Post;
  use App\Models\User;
  use App\Http\Requests\StorePostRequest;
  

class PostController extends Controller
{
   public function index() {
       
    // $Posts = Post::simplePaginate(4);
      $Posts = Post::with('user')->paginate(5);

    // $Posts=Post::all();
    // $Posts=Post::where('title','first post')->get();

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


    public function store(StorePostRequest $request) {
       
      
        //  @dd($data);
        // Post::create( $data);
    //  request()->validate([
    //         'title' => ['required', 'min:3'],
    //         'description' => ['required', 'min:5'],
    //     ],[
    //         'title.required' => 'this is the changed message',
    //         'title.min' => 'i have changed the min'
    //     ]);
   // $data=$request->all();eaual to 
    $data=request()->all();
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
        request()->validate([
          'title' => ['required','min:3','unique:posts,title'],
        
          'description' => ['required', 'min:10']]);
          
        Post::
        where('id', $postId)
        ->update(['title' => $data['title'],
            'description'=>$data['description'],

            'user_id' => $data['post_creator']]);
  
      return redirect()->route('posts.show',$postId);

     }
 

}