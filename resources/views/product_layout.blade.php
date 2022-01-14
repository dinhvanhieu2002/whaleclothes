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
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('/public/frontend/images/logo.png')}}" type="image/x-icon">

  <title>WhaleClothes</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/bootstrap.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/grid.css')}}" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet" />
  <!-- <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->

</head>

<body class="sub_page">
  @yield('add_shipping_modal')
  @yield('delete_modal')
  @yield('no_cart_modal')
  <div class="hero_area">
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
                <input oninput="load_search(this)" type="text" name="search-text" class="search-txt" placeholder="Search">
                <button type="submit" id="search-btn">
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
  </div>

  <!-- shop section -->

    @yield('content')
    @yield('product_by_cate')
    @yield('product_by_brand')
    @yield('cart')
    @yield('product_detail')
    @yield('checkout')


  <!-- end shop section -->

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
  <script type="text/javascript">
    function loadSearch(param) {
      var txtSearch = param.value;
      $.ajax({
        url: "/WhaleWatch/searchajax.php",
        type: "get", //send it through get method
        data: {
          txt: txtSearch
        },
        success: function(data) {
          var row = document.getElementById('content');
          content.innerHTML = data;
        },
        error: function(xhr) {
          //Do Something to handle error
        }
      });
    }
  </script>
  <!-- <script>
    CKEDITOR.replace('editor1');
  </script> -->
  
  <script type="text/javascript">

    $(document).ready(function() {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      load_comment();

      function load_comment() {
        let product_id = $('.comment_product_id').val();

        $.ajax({
        url: "{{route('comment.load')}}",
        type: 'get',
        data: { loadcmt_product_id: product_id,
        },
        success: function(response) {

          $.each(response["comments"], function(key, item) {
            $('#comment_list').append('<div class="row tbl_comment_row">\
                                          <div class="avatar"><i class="fa fa-user-circle avt_icon"></i></div>\
                                          <div class="cont">\
                                            <div class="info">\
                                              <h5>'+item.user_name+'</h5>\
                                              <span>'+item.time+'</span>\
                                            </div>\
                                            <div class="cmt">'+item.content+'</div>\
                                          </div>\
                                      </div>');
          });
          
        }
      });
      }

      $('#cmtBtn').click(function()  {
        let product_id = $('.comment_product_id').val();
        let user_id = $('.comment_user_id').val();
        let comment_content = $('.comment_content').val();
        // let comment_content =  CKEDITOR.instances['editor1'].getData();
        let _token = $("input[name=_token]").val();

      $.ajax({
        url: "{{route('comment.add')}}",
        type: 'post',
        data: 
        { product_id: product_id, 
          user_id: user_id, 
          comment_content: comment_content,
          _token : _token
        },
        success: function(response) {
          console.log(response);
          $('.comment_content').val('');
          
          $('#comment_list').prepend('<div class="row tbl_comment_row">\
                                        <div class="avatar"><i class="fa fa-user-circle avt_icon"></i></div>\
                                        <div class="cont">\
                                          <div class="info">\
                                            <h5>'+response.username+'</h5>\
                                            <span>'+response.data.time+'</span>\
                                          </div>\
                                          <div class="cmt">'+response.data.content+'</div>\
                                        </div>\
                                    </div>');
        }
      });
      });

      });
  </script>
  <script type="text/javascript">
      //search ajax
      function load_search(param) {
      var txtSearch = param.value;
      $.ajax({
        url: "{{route('search.live')}}",
        type: "get", //send it through get method
        data: {
          txtSearch: txtSearch
        },
        success: function(response) {
          var row = document.getElementById('content');
          content.innerHTML = response["search_products"];
          // $('#content').html(response["search_products"]);
        },
        error: function(xhr) {
          //Do Something to handle error
        }
      });
    }

    
  </script>
</body>

</html>