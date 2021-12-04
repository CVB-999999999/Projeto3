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
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus">Contact us</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Login/Logout Button -->
            <?php if(auth()->guard()->guest()): ?>
                <a href="login" type="button" class="btn btn-light rounded-pill" style="width:8rem"> Log in </a>
            <?php endif; ?>
            <?php if(auth()->guard()->check()): ?>
                <div class="dropdown navbar-nav">
                    <button class="btn btn--outline-secondary nav-link rounded-3" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo e(Auth::user()->name); ?> <i class="bi bi-caret-down-fill"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-3 text-center dropdown-menu-dark"
                        aria-labelledby="dropdownMenuButton1">
                        <li><h5> <?php echo e(Auth::user()->email); ?> </h5></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/userposts">Go to Dashboard</a></li>
                        <li><a class="dropdown-item" href="/change-password">Change Password</a></li>
                        <li>
                            <form method="POST" action="/logout" class="dropdown-item">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-dark rounded-pill mt-3" type="submit" style="width: 10rem"> Log
                                    Out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>


<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show"
         style="margin: 0; padding: 0.5rem; vertical-align: center">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p><i class="bi bi-check-circle-fill"></i> <?php echo e(session('success')); ?> </p>
    </div>
<?php endif; ?>


<?php if(session()->has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show"
         style="margin: 0; padding: 0.5rem; vertical-align: center">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <p><i class="bi bi-x-circle-fill"></i> <?php echo e(session('error')); ?> </p>
    </div>
<?php endif; ?>

<!-- Content -->
<?php echo e($content); ?>


<!-- Footer -->
<footer class="footer mt-auto p-3 bg-dark text-white">
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
<?php /**PATH C:\Users\Paulo Garrido\Desktop\proj3\resources\views/components/navfoot.blade.php ENDPATH**/ ?>