@extends('layouts.app')

@section('content')

<style>
 html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }


            .title {
                font-size: 84px;
            }
            .links{
                width:40%;
                display:flex;
                flex-direction:column;
                margin-left:120px;
            }
           

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .content{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            #categ{
                width:80%;
            }
            .img{
                width:70%;
                heigth:160px;
                border:1px solid black;
                display: flex;
                flex-direction: row;
            }
            img{
                width:180px;
                heigth:110px;
            }
</style>

<div class="container">
   

<div id="logo" style="display: inline-block;">
<a href="home"><img src="images/logo.png" width="85%"></a>
</div>

<a href="announces" style="display: inline-block;padding:14px;
    font-size: 20px; background: #e1d445; border-radius: 3px;float:right;color:black;margin-top:45px;margin-left:10px">check-in</a>

<a href="announces" style="display: inline-block;padding:14px;
    font-size: 20px; background: #e1d445; border-radius: 3px;float:right;color:black;margin-top:45px;margin-left:10px">Put Your Ads</a>

<a href="{{ url('list') }}" style="display: inline-block;padding:14px;
    font-size: 20px; background: #e1d445; border-radius: 3px;float:right;color:black;margin-top:45px;margin-left:10px">La liste de mes annonces</a>

<a href="{{ url('categ') }}" style="display: inline-block;padding:14px;
    font-size: 20px; background: #e1d445; border-radius: 3px;float:right;color:black;margin-top:45px;margin-left:10px">All of Ads</a>
</div>


<form method="post" action="/recherche">
@csrf
  <div class="form-group col-md-2">
    <select class="form-control" id="exampleFormControlSelect1" name="category" value="{{ old('category') }}">
      <option>Choose Category</option>
      @foreach($categories as $categorie)
      <option value="{{ $categorie -> name_category }}">{{ $categorie -> name_category }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group col-md-2">
    <select class="form-control" id="exampleFormControlSelect1" name="city" value="{{ old('city') }}">
    <option>Choose City</option>
      @foreach($cities as $city)
      <option value="{{  $city -> name_city }}">{{ $city -> name_city }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group col-md-1">
  <input type="submit" class="form-control btn btn-success" value="Search">
  </div>

  </form>



    <br>
    <br>
    <br>
            <main role="main">

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
  <div class="content">
    <!-- Three columns of text below the carousel -->
    <div id="categ">
    <h1>Categories :</h1>
    <div class="row">
      <div class="col-lg-4">
      <a href="{{ url('postcat') }}?categories=1"><img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/informatic.jpg"></a>        <h6>Informatic & Multimedia</h6>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <a href="{{ url('postcat') }}?categories=2"><img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/transport.jpg"></a>        <h6>Transportation</h6>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <a href="{{ url('postcat') }}?categories=3"><img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/home.jpg"></a>
        <h6>Home & Garden</h6>
      </div>
      <div class="col-lg-4">
      <a href="{{ url('postcat') }}?categories=4"><img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/hobbies.jpg"></a>        <h6>Hobbies & Entertainment</h6>
      </div>
      <div class="col-lg-4">
      <a href="{{ url('postcat') }}?categories=5"><img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/beauty.jpg"></a>        <h6>Health & Beauty</h6>
      </div>
      <div class="col-lg-4">
      <a href="{{ url('postcat') }}?categories=6"><img class="bd-placeholder-img rounded-circle" width="140" height="140" src="images/opportunity.jpg"></a>        <h6>Good Opportunity</h6>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>


                <div class="links">
                <h1 id="city">Cities:</h1>

                    <a href="{{ url('postcity') }}?cities=1">Casa Blanca</a>
                    <a href="{{ url('postcity') }}?cities=2">Rabat</a>
                    <a href="{{ url('postcity') }}?cities=3">Marrakech</a>
                    <a href="{{ url('postcity') }}?cities=4">Agadir</a>
                    <a href="{{ url('postcity') }}?cities=5">Fes</a>
                    <a href="{{ url('postcity') }}?cities=6">Tanger</a>
                    <a href="{{ url('postcity') }}?cities=7">Laayoune</a>

                </div>

                <div class="aside" style="border:3px solid #C3F4EE; padding:7px;">
                <h3>Boite de message :</h3>
                <hr>
                @foreach($messages as $message)
    <p style="color:black">{{ $message->content }} </p> Envoyé par : <a href="#">{{ getBuyerName($message->id_buyer) }}</a>
    <hr>
    @endforeach
                </div>



</div>
<br>
<br>
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


</main>

<br>
@endsection
