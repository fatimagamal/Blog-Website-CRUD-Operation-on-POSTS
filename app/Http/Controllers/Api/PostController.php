<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
  public function index()
  {
      $Posts=Post::all();
    //   foreach
    return  new PostResource::collection($Posts);
}

  public function show($posId)
  {
      $Post=Post::find($posId);
      return  new PostResource($Post);
  }

  public function store(StorePostRequest $request) {
  
$data=request()->all();
   $Post= Post::create([
        'title'=>$data['title'],
        'description'=>$data['description'],
         'user_id'=>$data['post_creator'],   
    ]); 
    return  new PostResource($Post);

}
}
