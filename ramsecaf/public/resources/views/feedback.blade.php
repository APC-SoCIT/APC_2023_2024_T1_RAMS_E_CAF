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
@include('sweetalert::alert')
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
                <h5 class="mb-0"><strong>Feedback</strong></h5>
              </div>

              <div class="card-body">
                <!-- Single item -->
                <div class="row">
                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  </div>
                  <div class="">

                    <p>Please provide your honest feedback for the food stall you ordered from.</p>
                    <form novalidate class="needs-validation" method="post" enctype="multipart/form-data" action="{{url('feedback')}}">
				            @csrf
                      <input type="hidden" value="{{$cartid}}" name="cart_id">
                      <input type="hidden" value="{{$user_id}}" name="user_id">
                      <div class="mb-3">
                      <textarea class="form-control" name="comment_1" id="exampleFormControlTextarea1" rows="3" required></textarea>
                      </div>
                      <p>Please provide your honest feedback for the Rams E-Caf WebApp.</p>
                      <div class="mb-3">
                      <textarea class="form-control" name="comment_2" id="exampleFormControlTextarea1" rows="3" required></textarea>
                      </div>
                        <button type="submit" class="btn btn-warning">Submit Feedback</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="addtocart" tabindex="-1" aria-labelledby="addtocartLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Feedback</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Thankyou for your feedback!
                </div>
                <div class="modal-footer">
                  <a href="index.html">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Return to Home Page</button>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <script>// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()</script>
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