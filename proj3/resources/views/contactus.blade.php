<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/map.css">
    <link rel="stylesheet" href="css/p3.css">
    <title>Contact Us | A Tutoring Company</title>
</head>

<body  class="d-flex flex-column min-vh-100">
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
                    <!-- No buttons here -->
                </ul>
                <!-- Login Button -->
                <button type="button" class="btn btn-light rounded-pill" style="width:120px"> Log in </button>
            </div>
        </div>
    </nav>

    <!-- Contact info -->
    <div class="container mt-4">
        <div class="card-group">
            <div class="card">
                <h4 class="card-title mx-auto"> <i class="bi bi-envelope"></i> Email </h4>
                <a class="card-body mx-auto  link-black" href="mailto:general@tutoringco.com"
                   > general@tutoringco.com </a>
            </div>
            <div class="card">
                <h4 class="card-title mx-auto"> <i class="bi bi-geo-alt"></i> Address </h4>
                <div class="card-body mx-auto text-center"> R. Gen. Humberto Delgado 101, 4900-317 Viana do Castelo
                </div>
            </div>
            <div class="card">
                <h4 class="card-title mx-auto"> <i class="bi bi-telephone"></i> Mobile Phone </h4>
                <a class="card-body mx-auto link-black" href="tel:+912345678">
                    912345678 </a>
            </div>
        </div>
    </div>

    <!-- Location Map -->
    <div class="container map-responsive mt-3">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2979.19498797044!2d-8.83524428429043!3d41.694726184848186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25b62a2ddb8c75%3A0x358dfba749064442!2sEsta%C3%A7%C3%A3o%20Viana%20Shopping!5e0!3m2!1spt-PT!2spt!4v1634823150023!5m2!1spt-PT!2spt"
            width="100%" height="100%" posicion="absolute" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                    <li><a href="aboutus" class="link-grey">About us</a></li>
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
            <!-- Company name again? -->
            <div class="col-md-5 ps-5 mx-auto">
                <img src="/images/owl.svg" style="width: 80px;">
                A Tutoring Company
            </div>
        </div>
    </footer>
</body>

</html>