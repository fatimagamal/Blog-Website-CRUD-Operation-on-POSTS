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
            
             @foreach($Posts as $Post)
         
              <tr>
                <th scope="col">{{$Post->id}}</th>
                <td scope="col">{{$Post->title}}</td>
                <td scope="col">{{isset($Post->user)?$Post->user->name:'Not Found'}}</td>
                <td scope="col">{{Carbon\Carbon::parse($Post->created_at)->format('Y-m-d')}}</td>    
                <td class="d-flex ">      
                 <a href="{{route('posts.show',$Post->id)}}" class="btn btn-primary">View</a>
                <a href="{{route('posts.edit',$Post->id)}}" class="btn btn-primary">Edite</a>
              
                <form class="col-2" method="post" action="{{ route('posts.destroy', $Post->id) }}">
                      @csrf
                      @method ('delete')
                      <input type="hidden" name="_method" value="DELETE">
                     <button type="submit" class="btn btn-danger" onclick=" return confirm('Are you sure you to delete this post?')">Delete</button>
                    </form>

                    </td>
              </tr>
              @endforeach      
              
          
 
  </tbody>
</table>
<ul class="pagination">
{{ $Posts->render() }} 
</ul>
@endsection
