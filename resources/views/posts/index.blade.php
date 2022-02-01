@extends('layouts.app')

@section('title')index
@endsection

@section('content')
</br>
  <div class="text-center">
            <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
        </div>
        
<table class="table table-striped">
  <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
  </thead>
  <tbody>
            
             @foreach($allPosts as $Post)
              <tr>
                <th scope="col">#</th>
                <td scope="col">{{$Post['title']}}</td>
                <td scope="col">{{$Post['posted_by']}}</td>
                <td scope="col">{{$Post['created_at']}}</td>          
                <td> <a href="{{route('posts.show',1)}}" class="btn btn-primary">View</a>
                <a href="#" class="btn btn-primary">Edite</a>
                <a href="#" class="btn btn-danger">Delete</a>  </td>
              </tr>
              @endforeach      
              
          
 
  </tbody>
</table>
@endsection