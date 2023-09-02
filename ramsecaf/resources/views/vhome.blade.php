<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
        <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

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

            <div class="col-6">
                <ol class="list-group list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="">
                            <h1>Best Seller</h1>
                            <p class =".fs-1">(As of February, 2023)</p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Food item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Number of Sales</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                            <tr>
                            <td>
                            <img src="images/asdf.png" class="rounded-circle mb-2" style="width: 100px; height: 100px; position: relative;"> <p class="fs-5 fw-bold">2pc. Barbeque</p></td>
                            <td><p class="fs-2">₱ 100</p></td>
                            <td><p class="fs-2">16</p></td>
                            </tr>
                            
                        </tbody>
                        </table>
                        
                        
                        <li class="list-group-item align-items-end text-end">
                        <h3> Total Sale: ₱1600 </h3>
                        </li>
                </ol>
            </div>

            <div class="col-6">
                <ol class="list-group list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="">
                            <h1>Daily Sales</h1>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Qty</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($product as $product)
                            <tr>
                            <td>{{$product->productsold}}</td>
                            <td>{{$product->productname}}</td>
                            <td>₱{{$product->price}}</td>
                            <td>₱{{$product->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        
                        </li>
                        <li class="list-group-item align-items-end text-end">
                        <h3> Total Sale: ₱{{$today_sales}} </h3>
                        </li>
                </ol>
            </div>

            <div class="col-6 mt-4">
                <ol class="list-group list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="">
                            <h1>Weekly Sales</h1>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Qty</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach ($product_week as $product_week)
                            <tr>
                            <td>{{$product_week->productsold}}</td>
                            <td>{{$product_week->productname}}</td>
                            <td>₱{{$product_week->price}}</td>
                            <td>₱{{$product_week->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                        
                        </li>
                        <li class="list-group-item align-items-end text-end">
                        <h3> Total Sale: ₱{{$weekly_sales}} </h3>
                        </li>

                </ol>
            </div>

            <div class="col-6 mt-4">
                <ol class="list-group list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="">
                            <h1>Monthly Sales</h1>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        
                        <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Qty</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                 

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>

</html>