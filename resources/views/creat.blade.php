@extends('layouts.app')

@section('content')

<style>
.img {
width: 190px;
heigth:120px;
}
</style>

<div class="container" style="border:1px solid gray">
<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>

<h1>Post Your Ad</h1>
<hr>

<form method="post" action="announces" enctype="multipart/form-data">
@csrf
  <div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">Choose Category :</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category" value="{{ old('category') }}">
      @foreach($categories as $categorie)
      
      <option value="{{ $categorie->id}}">{{ $categorie -> name_category }}</option>
      @endforeach
    </select>
    {{ $errors->first('category')}}
  </div>

  <div class="form-group col-md-6">
    <label for="exampleFormControlSelect1">Choose City :</label>
    <select class="form-control" id="exampleFormControlSelect1" name="city" value="{{ old('city') }}">
      @foreach($cities as $city)
      <option value="{{ $city -> id }}">{{ $city -> name_city }}</option>
      @endforeach
    </select>
    {{ $errors->first('city')}}
  </div>

  <div class="form-group">
  
    <label for="exampleFormControlInput1">Ad Title :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}">
    @if(count($errors))
    <div class="alert alert-danger" role="alert">{{ $errors->first('title')}}</div>
    @endif
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description :</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description') }}</textarea>
    @if(count($errors))
    <div class="alert alert-danger" role="alert">{{ $errors->first('description')}}</div>
    @endif
  </div>

  <div class="form-group col-md-4">
    <label for="exampleFormControlInput1">The Price :</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="price" value="{{ old('price') }}">
    @if(count($errors))
    <div class="alert alert-danger" role="alert">{{ $errors->first('price')}}</div>
    @endif
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
<br>
<br>
</div>
<br>
<br>
<br>
<br>


@endsection