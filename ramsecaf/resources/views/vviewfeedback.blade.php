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

<div class="bg-box" id="vendorbgcolor">
        <img src="images/kexpresscaf.png" id="kexpresscafimg">
    </div>
    <!-- header section -->
    <header class="header_section" id="knavbg">
        <div class="container-fluid" >
            <nav class="navbar navbar-expand-lg custom_nav-container" id="vendorheadcolor">
                <img src="{{$logo}}" width="100" height="100" > 
                <a class="navbar-brand" href="/vendorhome">
                    <span>
                        <p class="kcursive">{{$storename}}</p>
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

<div class="container-fluid">
<div class="row">

    <div class="col-12 my-4"> <!-- Added the "my-4" class for vertical margin -->
        <ol class="list-group list-group">
            <li class="list-group-item text-center">
                <div>
                    <h1 class="kcursive">Feedback List</h1>
                    <div class="input-group mb-3">
                        <input type="date" id="startDate" class="form-control" oninput="filterByDate()">
                        <input type="date" id="endDate" class="form-control" oninput="filterByDate()">
                        <button class="btn btn-primary" id="setWeek1Button">First Week</button>
                        <button class="btn btn-primary" id="setWeek2Button">Second Week</button>
                        <button class="btn btn-primary" id="setWeek3Button">Third Week</button>
                        <button class="btn btn-primary" id="setWeek4Button">Fourth Week</button>
                    </div>
                </div>
            </li>
        </ol>
    </div>


    <div class="row">
        <div class="col-6">
            <ol class="list-group list-group">
                <li class="list-group-item text-center">

                <div>
                    <h1 class="kcursive">Food Feedback</h1>
                    <button class="btn btn-outline-success active m-2" onclick="filterFeedback('food', 'Positive')">Positive Feedback</button>
                    <button class="btn btn-outline-danger active m-2" onclick="filterFeedback('food', 'Negative')">Negative Feedback</button>
                </div>

                </li>
                <div class="comment_1 list-group-item" id="vendorfeedbackscroll">
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
                                    {{ $feedbacklists->created_at->addMinutes(500)->format('F j, Y g:i A') }}
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
                <div class="comment_2 list-group-item" id="vendorfeedbackscroll">
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
                                {{ $feedbacklists->created_at->addMinutes(500)->format('F j, Y g:i A') }}
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
    function formatDateInput(date) {
        const year = date.getFullYear();
        const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Month is 0-based, so add 1
        const day = date.getDate().toString().padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    function filterFeedback(type, sentiment) {
        const feedbackItems = document.querySelectorAll(`.${type}`);
        feedbackItems.forEach(item => {
            const isSentimentMatch = sentiment === 'All' || item.classList.contains(sentiment);
            const isDateMatch = isDateWithinRange(item);
            if (isSentimentMatch && isDateMatch) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function isDateWithinRange(item) {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const itemDate = item.querySelector('.card-footer').textContent;
        const feedbackDate = new Date(itemDate);

        return feedbackDate >= new Date(startDate) && feedbackDate <= new Date(endDate);
    }

    function filterByDate() {
        const feedbackItems = document.querySelectorAll('.food');
        feedbackItems.forEach(item => {
            const isSentimentMatch = document.getElementById('sentimentFilter').value === 'All' || item.classList.contains(document.getElementById('sentimentFilter').value);
            const isDateMatch = isDateWithinRange(item);
            if (isSentimentMatch && isDateMatch) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    function setDateFilterToWeek(weekNumber) {
        console.log(`Setting date filter for week ${weekNumber}`);
    
    // Get the current date
        const currentDate = new Date();

    // Calculate the first day of the current month
        const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

    // Calculate the first day of the selected week by adding (weekNumber - 1) * 7 days to the first day of the month
        const firstDayOfWeek = new Date(firstDayOfMonth);
        firstDayOfWeek.setDate(firstDayOfMonth.getDate() + (weekNumber - 1) * 7);

    // Calculate the last day of the selected week by adding 6 days to the first day of the week
        const lastDayOfWeek = new Date(firstDayOfWeek);
        lastDayOfWeek.setDate(firstDayOfWeek.getDate() + 6);

    // Format the dates in YYYY-MM-DD format (required for date input fields)
        const startDateFormatted = formatDateInput(firstDayOfWeek);
        const endDateFormatted = formatDateInput(lastDayOfWeek);

    // Set the calculated dates in the input fields
        document.getElementById('startDate').value = startDateFormatted;
        document.getElementById('endDate').value = endDateFormatted;

    // Call the filterByDate function to apply the filter
        filterByDate();
    }

    // Add buttons for each week
    document.getElementById('setWeek1Button').addEventListener('click', () => setDateFilterToWeek(1));
    document.getElementById('setWeek2Button').addEventListener('click', () => setDateFilterToWeek(2));
    document.getElementById('setWeek3Button').addEventListener('click', () => setDateFilterToWeek(3));
    document.getElementById('setWeek4Button').addEventListener('click', () => setDateFilterToWeek(4));


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