<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/p3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home | A Tutoring Company</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="home">
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
                <a  href="login" type="button" class="btn btn-light rounded-pill" style="width:120px"> Log in </a>
            </div>
        </div>
    </nav>

    <!-- Carousel single img -->
    <div id="imgStart" class="carousel slide text-center" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/tutoring.jpg" alt="smart people">
                <!-- Caption -->
                <div class="carousel-caption">
                    <h3 class="shadow-lg">Creating smart people since 1999</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards to show what they tutor -->
    <div class="container mx-auto mt-5">
        <div class="row row-cols-md-3">
            <div class="card wh-card">
                <h2 class="card-title mx-auto text-center"> First to third cycle </h2>
                <ul class="card-body mx-auto">
                    <li> Tutoring to all subjects</li>
                    <li> Preperation to final exams</li>
                </ul>
            </div>
            <div class="card wh-card">
                <h2 class="card-title mx-auto text-center"> Secondary school </h2>
                <ul class="card-body mx-auto">
                    <li> Tutoring to all subjects</li>
                    <li> Preperation to final exams</li>
                </ul>
            </div>
            <div class="card wh-card">
                <h2 class="card-title mx-auto text-center"> Higher education </h2>
                <ul class="card-body mx-auto">
                    <li> Tutoring to all math subjects</li>
                    <li> Tutoring to all computing subjects</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- More info -->
    <div class="text-center">
        <button class="btn btn-dark rounded-pill" style="width: 250px; height: 50px;">
            <h5>More information</h5>
        </button>
    </div>

    <!-- Why us -->
    <!-- Cards with markting -->
    <div class="container mx-auto mt-5">
        <h1 class="text-center" style="margin-bottom: 2%;"> Why Us?</h1>
        <div class="row row-cols-md-3">
            <div class="card wh-card">
                <h2 class="card-title mx-auto text-center"></i> High Success Rate </h2>
                <div class="card-body mx-auto">
                    Our students are 30% more likelly to success in their education than our competition
                </div>
            </div>
            <div class="card wh-card">
                <h2 class="card-title mx-auto text-center"></i> Best Resources </h2>
                <div class="card-body mx-auto">
                    All our resources are made by teachers curently teaching the subjects to ensure that they are
                    the best possible
                </div>
            </div>
            <div class="card wh-card">
                <h2 class="card-title mx-auto text-center"> Ease of Use </h2>
                <div class="card-body mx-auto">
                    As we have all our resouces online our students can study whenever they want
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
                    <li><a href="aboutus" class="link-grey">About
                            us</a></li>
                    <li><a href="contactus" class="link-grey">Contact
                            us</a></li>
                    <li><a href="https://gdpr-info.eu/" class="link-grey">Terms
                            and Conditions</a></li>
                    <li><a href="https://gdpr-info.eu/"
                            class="link-grey">Privacy Policy</a></li>
                </ul>
            </div>
            <!-- Social Media -->
            <div class="col-md-4 ps-5">
                <ul style="list-style-type: none;">
                    <li>
                        <h4>Social Media</h4>
                    </li>
                    <li><a href="https://www.facebook.com"
                            class="link-grey">Facebook</a></li>
                    <li><a href="https://www.linkedin.com"
                            class="link-grey">Linked in</a></li>
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