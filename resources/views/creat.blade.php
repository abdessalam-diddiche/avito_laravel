@extends('layouts.master')

@section('content')

<style>
.img {
width: 190px;
heigth:120px;
}
</style>

<div class="container" style="border:1px solid gray">

<h1>Post Your Ad</h1>
<hr>

<form methode="post" action="announces">
@csrf
  <div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">Category :</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category">
      <option>Choose Category</option>
      @foreach($categories as $categorie)
      <option>{{ $categorie -> name_category }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">Town :</label>
    <select class="form-control" id="exampleFormControlSelect1" name="city">
      <option>Choose City</option>
      @foreach($cities as $city)
      <option>{{ $city -> name_city }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Ad Title :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1">The Price :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="price">
  </div>

<div class="row">
  <div class="file-field col-md-3">
  <label for="exampleFormControlInput1">Choose file 1 :</label>
    <div class="z-depth-1-half mb-4">
      <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img"
        alt="example placeholder">
    </div>
    <div class="d-flex">
      <div class="btn btn-mdb-color btn-rounded float-left">
        <input type="file" name="image1">
      </div>
    </div>
  </div>
  <div class="file-field col-md-3">
  <label for="exampleFormControlInput1">Choose file 2 :</label>
    <div class="z-depth-1-half mb-4">
      <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img"
        alt="example placeholder">
    </div>
    <div class="d-flex">
      <div class="btn btn-mdb-color btn-rounded float-left">
        <input type="file" name="image2">
      </div>
    </div>
  </div>
 
  </div>
  <br>

  <div class="d-flex justify-content-center">
  <input type="submit" class="form-control btn btn-primary btn-lg" value="Submit Your Ad">
  </div>

  
</form>

</div>
<br>
<br>


@endsection