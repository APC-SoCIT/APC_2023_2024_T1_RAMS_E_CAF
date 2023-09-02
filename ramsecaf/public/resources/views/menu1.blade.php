<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> Rams E-Caf </title>

    <!-- bootstrap core css -->
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <!-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" /> -->
    <!-- font awesome style -->
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet" /> -->

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    
</head>

<body class="sub_page">
@include('sweetalert::alert')
    <div class="hero_area">
        <div class="bg-box">
            <img src="images/ramsbg.jpg" alt="">
        </div>
        <!-- header section -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <img src="images/ramslogo.png">
          <a class="navbar-brand" href="/home">
            <span>
              <p>Rams E-Caf</p>
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
            </ul>
            <div class="user_option">
            <a href="/profile" class="user_link">
              <i class="fa fa-user" aria-hidden="true"></i>
              Profile
            </a>
              <a href="#logout" data-bs-toggle="modal" data-bs-target="#logout" tabindex="-1">
                <button type="button" class="btn btn-warning">Log Out</button>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    </div>
    <!-- food section -->

    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Menu
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter=".all">All</li>
                <li data-filter=".ricemeals">Rice Meals</li>
                <li data-filter=".pasta">Pasta</li>
                <li data-filter=".beverages">Beverages
            </ul>

            <div class="filters-content">
                <div class="row grid">
                @forEach($product as $product)
                @if ($product->isactive == 1)
                    <div class="col-sm-6 col-lg-3 all {{$product->category}}">
                        <div class="box">
                            <div>
                                    <div class="img-box hover-zoom">
                                        <img src="{{url('images/'.$product->image)}}" alt="">
                                    </div>
                                
                                <div class="detail-box">
                                    <h5>
                                        {{$product->productname}}
                                    </h5>
                                    <div class="options">
                                        <h6>
                                        ₱ {{$product->price}}
                                        </h6>
                                        <h6>
                                        Stocks: {{$product->stocks}}
                                        </h6>
                                    </div>
                                    @if ($product->stocks != 0)
                                    <a href="/addtocart/{{$product->id}}" class="btn btn-warning float-end mb-3" type="submit"><i class="bi bi-plus-circle-fill"></i>  Add to Cart</a>
                                    @else 
                                    <button href="" class="btn btn-warning float-end mb-3" type="submit" disabled>Out of Stock</button>
                                    @endif
                                  </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforEach
                </div>
            </div>
            <div class="btn-box">
                <a href="/proceedtocart">
                    Proceed to cart
                </a>
            </div>
        </div>
    </section>
    <!-- end food section -->

    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="logout" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Log Out</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to log out?
            </div>
            <div class="modal-footer">
            <a href="{{url('/signout')}}">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Yes</button>
              </a>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>

    <span id="displayYear" style="display:none"></span>

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>