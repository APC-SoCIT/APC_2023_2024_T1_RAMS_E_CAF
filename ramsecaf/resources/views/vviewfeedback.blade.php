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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">


</head>

<body>

<div class="bg-box">
<img src="images/kexpresscaf.png" id="kexpresscafimg">
    </div>
    <!-- header section -->
    <header class="header_section" id="knavbg">
        <div class="container-fluid" >
            <nav class="navbar navbar-expand-lg custom_nav-container" id="headcolor">
            <img src="images/kitchenexpress.png" width="100" height="100" >
                <a class="navbar-brand" href="/vendorhome">
                <span>
                    <p class="kcursive">{{ Auth::user()->name }}</p>
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
<body>

<div class="container">
    <div class="row">
        <div class="col-6">
            <ol class="list-group list-group">
                <li class="list-group-item text-center">
                <div>
                    <h1 class="kcursive">Food Feedback</h1>
                    <button class="btn btn-outline-success active m-2" id="positiveButton" onclick="filterFeedback('food', 'Positive'); highlightButton('positiveButton', 'negativeButton')">Positive Feedback</button>
                    <button class="btn btn-outline-danger active m-2" id="negativeButton" onclick="filterFeedback('food', 'Negative'); highlightButton('negativeButton', 'positiveButton')">Negative Feedback</button>
                </div>
                </li>
                <div class="comment_1">
                    @if (!$feedbacklist->isEmpty())
                        @forEach($feedbacklist as $feedbacklists)
                            <div class="card m-3 text-center {{$feedbacklists->sentiment_1}} food">
                                <div class="card-header">
                                    <h5 class="row"><strong class="h3 fw-bold fs-4"><span class="badge rounded-pill bg-{{$feedbacklists->sentiment_1 === 'Positive' ? 'success' : 'danger'}}"> Order # {{$feedbacklists->cart_id}}</span></strong></h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$feedbacklists->comment_1}}</h5>
                                </div>
                                <div class="card-footer text-muted">
                                    {{$feedbacklists->created_at}}
                                </div>
                            </div>
                        @endforEach
                    @endif
                </div>
            </ol>
        </div>
        <div class="col-6">
            <ol class="list-group list-group">
                <li class="list-group-item text-center">
                    <div>
                        <h1 class="kcursive">Vendor Feedback</h1>
                        <button class="btn btn-outline-success active m-2" onclick="filterFeedback('vendor', 'Positive')">Positive Feedback</button>
                        <button class="btn btn-outline-danger active m-2" onclick="filterFeedback('vendor', 'Negative')">Negative Feedback</button>
                    </div>
                </li>
                <div class="comment_2">
                    @if (!$feedbacklist->isEmpty())
                        @forEach($feedbacklist as $feedbacklist)
                            <div class="card m-3 text-center {{$feedbacklist->sentiment_2}} vendor">
                                <div class="card-header">
                                    <h5 class="row"><strong class="h3 fw-bold fs-4"><span class="badge rounded-pill bg-{{$feedbacklist->sentiment_2 === 'Positive' ? 'success' : 'danger'}}"> Order # {{$feedbacklist->cart_id}}</span></strong></h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{$feedbacklist->comment_2}}</h5>
                                </div>
                                <div class="card-footer text-muted">
                                    {{$feedbacklist->created_at}}
                                </div>
                            </div>
                        @endforEach
                    @endif
                </div>
            </ol>
        </div>
    </div>
</div>

<script>
    function filterFeedback(type, sentiment) {
        const feedbackItems = document.querySelectorAll(`.${type}`);
        feedbackItems.forEach(item => {
            if (sentiment === 'All' || item.classList.contains(sentiment)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>

<script>
    function highlightButton(selectedButton, otherButton) {
        const selectedBtn = document.getElementById(selectedButton);
        const otherBtn = document.getElementById(otherButton);

        selectedBtn.classList.remove('');
        selectedBtn.classList.add('btn-outline-success');

        otherBtn.classList.remove('active');
        otherBtn.classList.add('');
    }
</script>

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

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>

</html>