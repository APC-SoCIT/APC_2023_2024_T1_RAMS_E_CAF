
<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  @include('sweetalert::alert')
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
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
    integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
    crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

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
              <a href="profile.html" class="user_link">
                <i class="fa fa-user" aria-hidden="true"></i>
                Profile
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->


    <section class="h-100 gradient-custom">
      <div class="container py-3">
        <div class="row d-flex justify-content-center my-4">
          <div class="col-md-8">
            <div class="card mb-4">
              <div class="card-header py-3">
              @if ($product[0]->store_name == 'Kitchen Express')
              <div class="d-flex justify-content-between align-items-center"><h5 class="mb-0 text-center"><strong>Kitchen Express</strong></h5>
              <a href="/kitchenexpress"type="button" class="btn btn-warning">Add another item</a></div>
              @endif
              @if ($product[0]->store_name == 'Red Brew')
              <div class="d-flex justify-content-between align-items-center"><h5 class="mb-0 text-center"><strong>Red Brew</strong></h5>
              <a href="/redbrew"type="button" class="btn btn-warning">Add another item</a></div>
              @endif
              @if ($product[0]->store_name == 'La Mudras Corner')
              <div class="d-flex justify-content-between align-items-center"><h5 class="mb-0 text-center"><strong>La Mudras Corner</strong></h5>
              <a href="/lamudras" type="button" class="btn btn-warning">Add another item</a></div>
              @endif
              </div>
              <div class="card-body">
                <!-- Start -->
                <p style="display:none" type="hidden">{{$total = 0}}</p>
                @forEach($product as $product)
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                      <img src="{{url('images/'.$product->image)}}" class="" style="width: 120px;" alt="" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>

                  <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <p><strong>{{$product->productname}}</strong></p>
                    <p class="text-start"><strong>₱ {{$product->price}}</strong></p>
                    <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                      title="Remove item">
                      <!-- <i class="fas fa-trash"></i> --> 🗑
                    </button>
                    <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                      title="Move to the wish list">
                      <!-- <i class="fas fa-heart"></i> --> ♡
                    </button>
                    <!-- Data -->
                  </div>

                  <div class="col-lg-4 col-md-6 mb-2 mb-lg-0">
                    <!-- Quantity -->
                    <div class="d-flex mb-2" style="max-width: 300px">
                      <a href = "/subtractquantity/{{$product->product_id}}/{{$product->cart_id}}" class="btn btn-primary px-3 me-2"> - </a>

                      <div class="form-outline  text-center">
                        <input readonly id="form1" min="0" name="quantity" value="{{$product->product_quantity}}" type="number" class="form-control  text-center" />
                        
                      </div>

                      <a href = "/addquantity/{{$product->product_id}}/{{$product->cart_id}}"class="btn btn-warning px-3 ms-2"> + </a>
                    </div>
                    <p class="text-center mt-0">Quantity</label></p>
                    <!-- Quantity -->
                    <h6 class="display-6 text-center">₱ {{$product->product_total}}</h6>

                  </div>
                </div>
                <hr>
                <p style="display:none" type="hidden">{{$total = $total + $product->product_total}}</p>
                @endforEach

                <!-- End -->
              </div>
            </div>

            <div class="card mb-4">
              <div class="card-body">
                <p><strong>Pickup time starts:</strong></p>
                <p style="display:none" type="hidden">{{$new_time = date('H:i:s', strtotime('+20 minutes', strtotime(date('H:i:s'))))}}</p>
                <p class="mb-0">{{$new_time}}</p>
                
              </div>
            </div>
            <div class="card mb-4 mb-lg-0">
              <div class="card-body">
                <p><strong>We accept</strong></p>
                <img class="me-2" width="45px" src="images/gcash.png" alt="" />
                <img class="me-2" width="45px" src="images/paymaya.jpg" alt="" />
                <img class="me-2" width="45px" src="images/grabpay.png" alt="" />
                <img class="me-2" width="45px"
                  src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                  alt="Mastercard" />
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Order Total:</h5>
              </div>
              <div class="card-body">
              <h6 class="display-6">₱ {{$total}}</h6>
              </div>
              <div class="mx-auto p-1 mb-2">
                
                <a href="payment/{{$product->cart_id}}" type="button" class="btn btn-warning">
                  Proceed to Payment
                </a>
              
              </div>
            </div>
          </div>



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
          <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
          <!-- custom js -->
          <script src="js/custom.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
  integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>