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
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> Rams E-Caf </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
                <a class="navbar-brand" href="/vendorhome">
                    <span>
                        <p>Rams E-Caf</p>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mx-auto ">
                    </ul>
                    <div class="user_option">
                        <a href="/vendorhome" class="user_link">
                            View Reports
                        </a>
                        <a href="/vieworders" class="user_link">
                            Manage Orders
                        </a>
                        <a href="/editmenu" class="user_link">
                            Edit Menu
                        </a>
                        <a href="/vendorfeedbacks" class="user_link">
                            View Feedback
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

    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="list-group list-group">
                    <li class="list-group-item text-center">
                            <h1>Edit Menu</h1>
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Item</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($product_list as $product)
    <tr>

    <form>
        @csrf
      <td><img src="{{url('images/'.$product->image)}}" class="rounded-circle mb-2" style="width: 100px; height: 100px; position: relative;" alt="Avatar" /></td>
      <td>
        <input type="text" value="{{$product->productname}}" name="productname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </td>
      <td>{{$product->price}}</td>
      <td>{{$product->stocks}}</td>
      <td><a type="button" class="btn btn-warning">Edit</a>   <a type="button" class="btn btn-warning">Delete</a></td>
    </form>

    </tr>
    @endforEach


  </tbody>
</table>
                    </li>
                </ol>
            </div>
        </div>
    </div>

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
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".yourForm").submit(function(event) {
    event.preventDefault(); // prevent default form submission behavior
    var formData = $(this).serialize(); // get form data as serialized string
    Swal.fire({
        
        title: 'Are you sure?', 
        text: "Do you want to mark this order as claimed?", 
        icon: 'warning', 
        showCancelButton: true, 
        confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33',

    })
    .then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "{{url('confirm-order')}}?" + formData, // append form data to the URL
                type: "GET",
            });
            window.location.href = "/vieworders";
        } else {
            swal("Cancelled", "Form submission cancelled", "info");
        }
    });
});

    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>

</html>