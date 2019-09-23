@extends('layouts.app')


@section('content')
<style>
.pagination{
  justify-content: center;
  padding-left:5px;
}
</style>
<div class="container">
    

<div id="logo" style="display: inline-block;">
<a href="{{ url('acceuil') }}"><img src="images/logo.png" width="85%"></a>
</div>


<a href="announces" style="display: inline-block;padding:14px;
    font-size: 20px; background: #e1d445; border-radius: 3px;float:right;color:black;margin-top:45px">Put Your Ads</a>

</div>
@foreach($announces as $announce)

<div class="card d-flex justify-content-around" style="width:60rem; margin:50px auto;">
<div style="text-align:right;margin:9px;">
<a href="announces" style="padding:7px;
    font-size: 15px; background: #6495ED; border-radius: 3px;text-align:center;color:white;">Save</a>
</div>
  <div class="d-flex justify-content-center">
  
  <img src="{{ asset('storage/'.$announce->image1) }}" width="40%" heigth="80px" style="margin:15px">
  <img src="{{ asset('storage/'.$announce->image2) }}" width="40%" heigth="80px" style="margin:15px">

  
  </div>
  
  <div class="d-flex align-content-around flex-wrap">
  <div class="card-body">
    <h5 class="card-title">{{ $announce->title }}</h5>
    <p class="card-text">{{ $announce->description }}</p>
    <br>
    <a href="#" class="card-link">GSM :{{ $announce->phone }}</a>
    <a href="#" class="card-link">EMAIL :{{ $announce->email }}</a>
    <br>
    <br>
    <a href="{{ route('message.create', ['id_seller'=>$announce->id_user, 'id_annonce'=>$announce->id]) }}" style="padding:5px;
    font-size: 15px; background: #6495ED; border-radius: 3px;text-align:center;color:white;">Contacter le vendeur</a>

  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{ $announce->price }}</li>
    <li class="list-group-item">{{ $announce->name_city }}</li>
    <li class="list-group-item">{{ $announce->name_category }}</li>
  </ul>
  <div class="card-body d-flex flex-column" style="text-align:right">
    <a href="#" class="card-link">{{ Carbon\Carbon::parse($announce->created_at)->diffForHumans() }}</a>
    <a href="#" class="card-link">{{ $announce->created_at }}</a>
    
  </div>

  </div>

</div>
@endforeach







@endsection