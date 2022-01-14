@extends('layout')
@section('content')
@foreach($feature_product as $key => $feature) 
<div class='product col-md-6'>
    <div class='box'>
        <a href="{{URL::to('/product-detail/'.$feature->id)}}">
        <div class='img-box'>
            <img src="{{asset('/public/uploads/product/'.$feature->image)}}" alt=''>
        </div>
        <div class='detail-box'>
            <h6>{{$feature->product_name}}</h6>
            <h6>
            Price:
            <span>{{$feature->price}}</span>
            </h6>
        </div>
        <div class='new'>
            <span> Featured </span>
        </div>
        </a>
    </div>
</div>
@endforeach
@foreach($new_product as $key => $new)
<div class='product col-md-6 col-xl-3'>
    <div class='box'>
        <a href="{{URL::to('/product-detail/'.$new->id)}}">
        <div class='img-box'>
            <img src="{{asset('/public/uploads/product/'.$new->image)}}" alt=''>
        </div>
        <div class='detail-box'>
            <h6>{{$new->product_name}}</h6>
            <h6>
            Price:
            <span>{{$new->price}}$</span>
            </h6>
        </div>
        <div class='new'>
            <span> New </span>
        </div>
        </a>
    </div>
</div>
@endforeach
@endsection

@section('header')
<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{URL::to('/')}}">
          <img width="50" height="50" src="{{asset('/public/frontend/images/logo.png')}}" alt="">

            <span>
              WhaleClothes
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('/products')}}"> Clothes </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
            </ul>
            
            <div class="user_option-box">
              <form action="" method="POST">
                <input type="text" name="search-text" class="search-txt" placeholder="Search">
                <button type="submit" id="search-btn" on>
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
                <a href="{{URL::to('/cart')}}">
                  <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </a>
                @if(Session::get('user_id'))
                <a href="{{URL::to('/logout')}}">
                  <i class='fa fa-power-off' aria-hidden='true'></i>
                </a>
                @else
                <a href="{{URL::to('/login')}}">
                  <i class='fa fa-user' aria-hidden='true'></i>
                </a>
                @endif
              </form>    
            </div>
          </div>
        </nav>
      </div>
    </header>
@endsection
@section('footer')
<footer class="footer_section">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 footer-col">
        <div class="footer_detail">
          <h4>
            About
          </h4>
          <p>
            Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
          </p>
          <div class="footer_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 footer-col">
        <div class="footer_contact">
          <h4>
            Reach at..
          </h4>
          <div class="contact_link_box">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call +01 1234567890
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 footer-col">
        <div class="footer_contact">
          <h4>
            Subscribe
          </h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 footer-col">
        <div class="map_container">
          <div class="map">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-info">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </div>
</footer>
@endsection
@section('slider')
<!--Section: Block Content-->
<section>

  <!--Carousel Wrapper-->
  <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-2" data-slide-to="1"></li>
      <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="view">
          <img class="d-block w-100" src="{{asset('/public/backend/app-assets/img/slider/slide1.jpg')}}"
            alt="First slide">
          <a href="#!">
            <div class="mask rgba-black-light"></div>
          </a>
        </div>
        <div class="carousel-caption">
          <h3 class="h3-responsive">First shop item</h3>
          <p>First text</p>
        </div>
      </div>
      <div class="carousel-item">
        <!--Mask color-->
        <div class="view">
          <img class="d-block w-100" src="{{asset('/public/backend/app-assets/img/slider/slide2.jpg')}}"
            alt="Second slide">
          <a href="#!">
            <div class="mask rgba-black-light"></div>
          </a>
        </div>
        <div class="carousel-caption">
          <h3 class="h3-responsive">Second shop item</h3>
          <p>Secondary text</p>
        </div>
      </div>
      <div class="carousel-item">
        <!--Mask color-->
        <div class="view">
          <img class="d-block w-100" src="{{asset('/public/backend/app-assets/img/slider/slide3.jpg')}}"
            alt="Third slide">
          <a href="#!">
            <div class="mask rgba-black-light"></div>
          </a>
        </div>
        <div class="carousel-caption">
          <h3 class="h3-responsive">Third shop item</h3>
          <p>Third text</p>
        </div>
      </div>
    </div>
    <!--/Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/Controls-->
  </div>
  <!--/Carousel Wrapper-->

</section>
<!--Section: Block Content--> 
<!-- <section class="slider_section ">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel" style="background-image: url('https://www.chanel.com/us/img/t_one/q_auto:good,fl_lossy,dpr_1.2,f_jpg/w_768/prd-emea/sys-master/content/h3b/ha8/9408967409694-Hp_Corpo_ONE_Desktop.jpg%20768w,//www.chanel.com/us/img/t_one/q_auto:good,fl_lossy,dpr_1.2,f_jpg/w_1280/prd-emea/sys-master/content/h3b/ha8/9408967409694-Hp_Corpo_ONE_Desktop.jpg%201280w,//www.chanel.com/us/img/t_one/q_auto:good,fl_lossy,dpr_1.2,f_jpg/w_1920/prd-emea/sys-master/content/h3b/ha8/9408967409694-Hp_Corpo_ONE_Desktop.jpg%201920w,//www.chanel.com/us/img/t_one/q_auto:good,fl_lossy,dpr_1.2,f_jpg/w_2400/prd-emea/sys-master/content/h3b/ha8/9408967409694-Hp_Corpo_ONE_Desktop.jpg%202400w,//www.chanel.com/us/img/t_one/q_auto:good,fl_lossy,dpr_1.2,f_jpg/w_3000/prd-emea/sys-master/content/h3b/ha8/9408967409694-Hp_Corpo_ONE_Desktop.jpg%203000w')">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container-fluid ">
          <div class="row">
            <div class="col-md-12">
              <div class="detail-box">
                <h1> Smart Watches </h1> 
                <p>
                  Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                </p>
                <div class="btn-box">
                  <a href="" class="btn1"> Contact Us </a> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="container-fluid ">
          <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <h1>
                  Smart Watches
                </h1>
                <p>
                  Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                </p>
                <div class="btn-box">
                  <a href="" class="btn1">
                    Contact Us
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="{{asset('/public/frontend/images/slider-img.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="container-fluid ">
          <div class="row">
            <div class="col-md-6">
              <h1> Smart Watches </h1> 
              <div class="detail-box">
                <p>
                  Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                </p>
                <div class="btn-box">
                  <a href="" class="btn1"> Contact Us </a> 
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="{{asset('/public/frontend/images/slider-img.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ol class="carousel-indicators">
      <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
      <li data-target="#customCarousel1" data-slide-to="1"></li>
      <li data-target="#customCarousel1" data-slide-to="2"></li>
    </ol>
  </div>

</section> -->
@endsection
@section('social')
<div class="hero_social">
  <a href="">
    <i class="fa fa-facebook" aria-hidden="true"></i>
  </a>
  <a href="">
    <i class="fa fa-twitter" aria-hidden="true"></i>
  </a>
  <a href="">
    <i class="fa fa-linkedin" aria-hidden="true"></i>
  </a>
  <a href="">
    <i class="fa fa-instagram" aria-hidden="true"></i>
  </a>
</div>
@endsection
