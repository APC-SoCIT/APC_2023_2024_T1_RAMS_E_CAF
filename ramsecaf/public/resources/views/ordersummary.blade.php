<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">

  <title> Rams E-Caf </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
    crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
</head>

<body>

    <div class="hero_area">
    <div class="bg-box">
    <img src="{{asset('images/ramsbgprofile.jpg')}}" alt="">
  </div>
        <!-- header section -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container">
                <img src="{{asset('images/ramslogo.png')}}">
                <a class="navbar-brand" href="/home">
                        <span>
                            <p>Rams E-Caf</p>
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->

        <p style="display:none" type="hidden">{{$total = 0}}</p>
        <section class="h-100 gradient-custom">
            <div class="container py-3">
                <div class="row d-flex justify-content-center my-4">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0"><strong>{{$item[0]->store_name}} (Order number: {{$cart->id}})</strong></h5>
                            </div>
                        @forEach($item as $item)
                        
                            <div class="card-body">
                                <!-- Single item -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                            data-mdb-ripple-color="light">
                                            <img src="{{asset('images/'.$item->image)}}" class="w-100" alt="Blue Jeans Jacket" />
                                            <a href="#!">
                                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)">
                                                </div>
                                            </a>
                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong>{{$item->product_quantity }} x {{$item->productname }} (₱{{$item->price}})</strong></p>
                                        <p class="h5 mx-4">₱{{$item->product_total}}</p>
                                       
                                        <!-- <button type="button" class="btn btn-danger btn-sm mb-2"
                                            data-mdb-toggle="tooltip" title="Move to the wish list"> ♡
                                        </button> -->
                                        <!-- Data -->
                                    </div>
                                </div>
                            </div>
                            <p style="display:none" type="hidden">{{$total = $total + $item->product_total}}</p>
                            @endforeach

                            <!-- Single item -->
                            <hr class="my-4" />
                            <!-- Single item -->
                            
                            <!-- Single item -->

                        </div>
                        <div class="card mb-4">
                            <div class="card-header py-3">
                                <h5 class="mb-0"><strong>Order Total:</strong></h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                        ₱{{$total}}
                            </div>
                        </div>


                        <div class="card mb-4">
                            <div class="card-body">
                                <p><strong>Please pick up your orders by:</strong></p>
                                <p class="mb-0">12:15 pm</p>
                            </div>
                        </div>

                        <!-- <div class="card mb-4">
                            <div class="card-body mx-auto">
                                <a href="#addtocart" data-bs-toggle="modal" data-bs-target="#addtocart" tabindex="-1">
                                    <button type="button" class="btn btn-warning">Order
                                        Claimed</button>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="modal fade" id="addtocart" tabindex="-1" aria-labelledby="addtocartLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Feedback</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Thankyou for using Rams E-Caf! Would you mind sharing your feedback with us?
                            </div>
                            <div class="modal-footer">
                            <a href="/confirm-order/{{$cart->id}}">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Sure!</button>
                                </a>
                                <a href="/confirm-orders/{{$cart->id}}">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Later</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- jQery -->
                <script src="js/jquery-3.4.1.min.js"></script>
                <!-- popper js -->
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                    crossorigin="anonymous">
                    </script>
                <!-- bootstrap js -->
                <script src="js/bootstrap.js"></script>
                <!-- owl slider -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
                </script>
                <!-- isotope js -->
                <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
                <!-- nice select -->
                <script
                    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
                <!-- custom js -->
                <script src="js/custom.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>

</html>