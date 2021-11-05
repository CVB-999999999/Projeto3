<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/p3.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>About us | A Tutoring Company</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="/images/owl.svg" alt="Avatar Logo" style="width:50px;" class="rounded-pill">
                A tutoring Company
            </a>
            <!-- Collapse button when low width -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <!-- Nav bar buttons Left -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="contactus">Contact us</a>
                    </li>
                </ul>
                <!-- Login Button -->
                <a href="login" type="button" class="btn btn-light rounded-pill" style="width:120px"> Log in </a>
            </div>
        </div>
    </nav>

    <!-- Who are we-->
    <div class="text-center" style="margin: 3%;">
        <h1 style="margin-bottom: 1%;"> Who are we?</h1>
        A Tutoring Company was created in 1999 to attend the demand of providing highly quality services at a
        competetive price in the tutoring world.
    </div>

    <!-- Carousel with happy customer reviews -->
    <div id="carousel" class="carousel slide container" data-bs-ride="carousel">
        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/review1.jpg" class="d-block w-10 mx-auto" alt="review1" style="width: 100%;">
                <!-- Caption -->
                <div class="carousel-caption">
                    <h3 class="shadow-lg">They help me finish my course for basicly no cost</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/review2.jpg" class="d-block w-10 mx-auto" alt="review1" style="width: 100%;">
                <!-- Caption -->
                <div class="carousel-caption">
                    <h3 class="shadow-lg">Before I did not know how to read, now I'm addicted to books</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/review3.jpg" class="d-block w-10 mx-auto" alt="review1" style="width: 100%;">
                <!-- Caption -->
                <div class="carousel-caption">
                    <h3 class="shadow-lg">Now I can count to 100</h3>
                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Tutors presentetion section -->
    <div class="text-center p-5">
        <h1> Our Tutors.</h1>
    </div>
    <div class="container">
        <div class="row mx-auto">
            <div class="col-sm-4 p-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="/images/professor.jpg" class="card-img-top" alt="img4">
                    <div class="card-body">
                        <h5 class="card-title">André Palma</h5>
                        <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths for
                            Oxford in the year 1981.</p>
                        <a href="#" class="btn btn-primary">See profile</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="/images/professor.jpg" class="card-img-top" alt="img4">
                    <div class="card-body">
                        <h5 class="card-title">André Palma</h5>
                        <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths for
                            Oxford in the year 1981.</p>
                        <a href="#" class="btn btn-primary">See profile</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="/images/professor.jpg" class="card-img-top" alt="img4">
                    <div class="card-body">
                        <h5 class="card-title">André Palma</h5>
                        <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths for
                            Oxford in the year 1981.</p>
                        <a href="#" class="btn btn-primary">See profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-sm-4 p-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="/images/professor.jpg" class="card-img-top" alt="img4">
                    <div class="card-body">
                        <h5 class="card-title">André Palma</h5>
                        <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths for
                            Oxford in the year 1981.</p>
                        <a href="#" class="btn btn-primary">See profile</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="/images/professor.jpg" class="card-img-top" alt="img4">
                    <div class="card-body">
                        <h5 class="card-title">André Palma</h5>
                        <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths for
                            Oxford in the year 1981.</p>
                        <a href="#" class="btn btn-primary">See profile</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-3">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="/images/professor.jpg" class="card-img-top" alt="img4">
                    <div class="card-body">
                        <h5 class="card-title">André Palma</h5>
                        <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths for
                            Oxford in the year 1981.</p>
                        <a href="#" class="btn btn-primary">See profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-4 p-3 bg-dark text-white">
        <div class="row">
            <!-- About us -->
            <div class="col-md-3 ps-5">
                <ul style="list-style-type: none;">
                    <li>
                        <h4>Company</h4>
                    </li>
                    <li><a href="aboutUs" class="link-grey">About
                            us</a></li>
                    <li><a href="contactus" class="link-grey">Contact
                            us</a></li>
                    <li><a href="https://gdpr-info.eu/" class="link-grey">Terms
                            and Conditions</a></li>
                    <li><a href="https://gdpr-info.eu/" class="link-grey">Privacy Policy</a></li>
                </ul>
            </div>
            <!-- Social Media -->
            <div class="col-md-4 ps-5">
                <ul style="list-style-type: none;">
                    <li>
                        <h4>Social Media</h4>
                    </li>
                    <li><a href="https://www.facebook.com" class="link-grey">Facebook</a></li>
                    <li><a href="https://www.linkedin.com" class="link-grey">Linked in</a></li>
                </ul>
            </div>
            <!-- Company name -->
            <div class="col-md-5 ps-5 mx-auto">
                <img src="/images/owl.svg" style="width: 80px;">
                A Tutoring Company
            </div>
        </div>
    </footer>
</body>

</html>