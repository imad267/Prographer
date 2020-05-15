<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/costum.css')}}">
    <script src="https://kit.fontawesome.com/72acc5a47d.js"></script>

    <title>{{$title}}</title>
  </head>
  <body>
  @include('includes.header')

@if(auth::check())
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{$firstpost->image}}" height="700px" width="100px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{$firstpost->title}}</h5>
        <p>{{$firstpost->content}}</p>
      </div>
    </div>
    @foreach($posts as $post )
    <div class="carousel-item">
      <img src="{{$post->image}}" height="700px" width="100px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>{{$post->title}}</h5>
        <p>{{$post->content}}</p>
      </div>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@else

  <section class="Features ">
    <div class="row">
      <div class="container breafe col-lg-6 col-md-6 col-sm-12">
        <h1>Open up your imagination and let us see what you have </h1>
        <h3>Get started now</h3>
        <a type="button" class="btn btn-info btn-lg first_btn" href="{{ route('register') }}">Sign up</a>
        <a type="button" href="{{ route('login') }}" class="btn btn-light btn-lg first_btn">Login</a>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 ">
        <img class="main_img" src="https://www.popsci.com/resizer/J87ll-0AEJLnkuR4SOMMFEuTkPE=/1280x960/filters:focal(512x384:513x385)/arc-anglerfish-arc2-prod-bonnier.s3.amazonaws.com/public/QQK7SX3NGTLR6ZFR3WP6DYEMQE.jpg" alt="phone_img">
      </div>
    </div>
  </section>
@endif

  @include('includes.footer')



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
