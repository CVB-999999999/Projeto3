<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/p3.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login | A Tutoring Company</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div>
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="home.html">
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
                            <a class="nav-link" href="contactus.html">Contact us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <form action="/action_page.php" style="max-width: 300px;margin:auto;">
        <!-- Logo and Email Field -->
        <div class="mb-3 mt-3">
            <img src="/images/owl.svg" alt="Avatar Logo" style="width:300px;" class="rounded-pill">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <!-- Password Field-->
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <!-- Remember Me -->
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <!-- Submit -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Whitespace to make the footer go in the right place -->
    <!-- <div style="min-height: calc(100vh - 300px)"></div> -->

    <!-- Footer -->
    <footer class="mt-4 p-3 bg-dark text-white">
        <div class="row">
            <!-- About us -->
            <div class="col-md-3 ps-5">
                <ul style="list-style-type: none;">
                    <li>
                        <h4>Company</h4>
                    </li>
                    <li><a href="./aboutus.html" class="link-grey">About
                            us</a></li>
                    <li><a href="./contactus.html" class="link-grey">Contact
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