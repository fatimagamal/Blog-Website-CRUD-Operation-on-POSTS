
@extends('layouts.app')

@section('title')show
@endsection

@section('content')
<br>

    
<div class="card" style="width: 18rem;">
 
  <div class="card-body">
    <h5 class="card-title">Post Information</h5>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item">Title :<p class="card-text">{{$PostInfo->title}}</p></li> 
    <li class="list-group-item">Description : <p class="card-text">{{$PostInfo->description}}</p></li>    

  </ul>
</div>

<br><br>
<br>

<div class="card" style="width: 18rem;">
<div class="card-body">
    <h5 class="card-title">Post Creator Information</h5>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item">Name :<p class="card-text"> {{$PostInfo->user->name}}</p></li> 
    <li class="list-group-item">Email : <p class="card-text">{{$PostInfo->user->email}} </p></li>    
    <li class="list-group-item">Created At :<p class="card-text">{{Carbon\Carbon::parse($PostInfo->created_at)->format('l jS \\of F Y h:i:s A')}}</p></li> 

  </ul>
</div>
@endsection