
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
    <li class="list-group-item">Title :<p class="card-text">special title </p></li> 
    <li class="list-group-item">Description : <p class="card-text">Some quick example text </p></li>    

  </ul>
</div>

<br><br>
<br>

<div class="card" style="width: 18rem;">
<div class="card-body">
    <h5 class="card-title">Post Creator Information</h5>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item">Name :<p class="card-text">special title </p></li> 
    <li class="list-group-item">Email : <p class="card-text">Some quick example text </p></li>    
    <li class="list-group-item">Craeted At :<p class="card-text">special title </p></li> 

  </ul>
</div>
@endsection