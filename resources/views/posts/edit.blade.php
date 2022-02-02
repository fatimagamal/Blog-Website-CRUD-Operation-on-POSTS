


@extends('layouts.app')

@section('title')create
@endsection

@section('content')
<form method="POST" action="{{route('posts.update',$Post->id)}}">

         @csrf
         @method ('put')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input name="title" type="text"  value="{{$Post->title}}" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description"   class="form-control" id="exampleFormControlTextarea1" rows="3"> {{$Post->description}}</textarea>  
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control">
                @foreach($Users as $User)

                @if ($User->id == $Post->user_id)
              <option value="{{$User->id}}" selected> {{$User->name}}</option>
              @else
              <option value="{{$User->id}}" > {{$User->name}}</option>
              @endif

                @endforeach      
                </select>

            </div>
            <button class="btn btn-success">Update</button>
        </form>

    
        </table>
@endsection