<!DOCTYPE html>
<html>
    
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
  
        <div class="bg-box">
          <img src="images/ramsbgprofile.jpg" alt="">
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

  <ol class="list-group list-group m-5">
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="text-center">
        <h1>Completed Orders</h1>
        <a href="/profile">
          <button type="button" class="btn btn-outline-warning ">Current Orders</button>
        </a>
        <a href="/complete">
          <button type="button" class="btn btn-outline-success active">Completed Orders</button>
        </a>
      </div>
    </li>
    @forEach($cart as $cart)
    <a href="/receipt/{{$cart->id}}" style="color:black">
    <li class="list-group-item d-flex justify-content-between align-items-start">
      <div class="ms-2">
        
        <h5 class="" class="row"><strong class="h3 fw-bold">{{$cart->store}} <span class="badge rounded-pill bg-success"> Order # {{$cart->id}}</span></strong></h5>

@forEach($product as $items)

@if($items->cart_id == $cart->id)

 <h6 class="m-0 mx-3">{{$items->product_quantity."x ". $items->productname}}</h6>

@endif

@endforEach
  
     
      </div>
      
      @if(!$feedback->contains('cart_id',$cart->id))
      <a href="/feedbackview/{{$cart->id}}" class="btn btn-warning mb-3 mx-2" type="submit">Provide Feedback</a>   
      @endif 
      
    </li>
    
    </a>
    
    @endforEach
  </ol>


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

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
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
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>
