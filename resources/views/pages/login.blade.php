<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('/public/frontend/images/logo.png')}}" type="image/x-icon">

  <title>WhaleClothes</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('/public/frontend/css/bootstrap.css')}}" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="{{asset('/public/frontend/css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset('/public/frontend/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('/public/frontend/css/responsive.css')}}" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{URL::to('/')}}">
            <span>
              <img width="50" height="50" src="{{asset('/public/frontend/images/logo.png')}}" alt="">

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
    <!-- end header section -->
  </div>

  <section class="login_part section_padding ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="login_part_text text-center">
            <div class="login_part_text_iner">
              <h2>New to our Shop?</h2>
              <p>There are advances being made in science and technology
              everyday, and a good example of this is the</p>
              <a href="{{URL::to('/signup')}}" class="btn_3">Create an Account</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="login_part_form">
            <div class="login_part_form_iner">
              <h3>Welcome Back ! <br>
              Please Sign in now</h3>
              <form class="row contact_form" action="{{URL::to('/execute-login')}}" method="post" novalidate>
                {{csrf_field()}}
                <div class="col-md-12 form-group p_star">
                  <input type="text" class="form-control" id="" name="username" value="" placeholder="Username">
                </div>
                <div class="col-md-12 form-group p_star">
                  <input type="password" class="form-control" id="" name="password" value="" placeholder="Password">
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account d-flex align-items-center">
                    <input type="checkbox" id="f-option" name="selector">
                    <label for="f-option">Remember me</label>
                  </div>
                  <button type="submit" value="submit" class="btn btn-primary">
                    Log in
                  </button >
                  <a class="lost_pass" href="#">Forget password?</a>
                  <?php
                    $message = Session::get('message');
                    if($message) {
                      echo $message;
                      Session::put('message', null);
                    }
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer section -->
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
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{asset('/public/frontend/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="{{asset('/public/frontend/js/bootstrap.js')}}"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="{{asset('/public/frontend/js/custom.js')}}"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->

</body>

</html>