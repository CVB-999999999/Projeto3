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
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="contactus">Contact us</a>
                    </li>
                @endguest
            </ul>

            <!-- Login/Logout Button -->
            @guest
                <a href="login" type="button" class="btn btn-light rounded-pill" style="width:8rem"> Log in </a>
            @endguest
            @auth
                <div class="dropdown navbar-nav">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end p-3 text-center" aria-labelledby="dropdownMenuButton1">
                        <li><h5> {{ Auth::user()->email }} </h5></li>
                        <li><a class="dropdown-item" href="#">Go to Dashboard</a></li>
                        <li><a class="dropdown-item" href="#">Change Password</a></li>
                        <li>
                            <form method="POST" action="/logout" class="dropdown-item">
                                @csrf
                                <button class="btn btn-dark rounded-pill mt-3" type="submit" style="width: 10rem"> Log Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>

<!-- Success Message -->
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" style="margin: 0">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p><i class="bi bi-check-circle-fill"></i> {{ session('success') }} </p>
    </div>
@endif

{{ $content }}

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
