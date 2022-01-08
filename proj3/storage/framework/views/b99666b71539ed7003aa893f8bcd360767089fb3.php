<?php
if (Auth::user() != null) {
    if (Auth::user()->type == 1) {       //  Tutor dashboard
        $href = '/tutor/dashboard';
    }
    if (Auth::user()->type == 2) {    //  Admin Dashboard
        $href = '/admin/dashboard';
    }
    if (Auth::user()->type == 0) {    //  Student dashboard
        $href = '/dashboard';
    }
} else {
    $href = '/';
}
?>

<body class="d-flex flex-column min-vh-100">

<!-- Nav Bar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <!-- Logo -->
        <?php if(auth()->guard()->guest()): ?>
            <a class="navbar-brand" href="/">
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <a class="navbar-brand" href=" <?php echo e($href); ?> ">
                        <?php endif; ?>
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
                                    <a class="nav-link" href="/contactus">Contact us</a>
                                </li>
                            <?php endif; ?>
                        </ul>

                        <!-- Login/Logout Button -->
                        <?php if(auth()->guard()->guest()): ?>
                            <a href="login" type="button" class="btn btn-light rounded-pill" style="width:8rem"> Log
                                in </a>
                        <?php endif; ?>
                        <?php if(auth()->guard()->check()): ?>
                            <div class="dropdown navbar-nav">
                                <button class="btn btn--outline-secondary nav-link rounded-3" type="button"
                                        id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <i class="bi bi-caret-down-fill"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-3 text-center dropdown-menu-dark"
                                    aria-labelledby="dropdownMenuButton1">
                                    <li><h5> <?php echo e(Auth::user()->email); ?> </h5></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?php echo e($href); ?>">Go to Dashboard</a></li>
                                    <li><a class="dropdown-item" href="/change-password">Change Password</a></li>
                                    <li>
                                        <form method="POST" action="/logout" class="dropdown-item">
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-dark rounded-pill mt-3" type="submit"
                                                    style="width: 10rem"> Log
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
    <script>
        Swal.fire(
            'Success!',
            '<?php echo e(session('success')); ?>',
            'success'
        )
    </script>
<?php endif; ?>


<?php if(session()->has('error')): ?>
    <script>
        Swal.fire(
            'An error occurred!',
            '<?php echo e(session('error')); ?>',
            'error'
        )
    </script>
<?php endif; ?>


<?php if(session()->has('login')): ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Logged in successfully'
        })
    </script>
<?php endif; ?>


<?php if(session()->has('logout')): ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Logged out successfully'
        })
    </script>
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
                <li><a href="/aboutus" class="link-grey">About
                        us</a></li>
                <li><a href="/contactus" class="link-grey">Contact
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
            <a href="/" class="link-grey">
                <img src="/images/owl.svg" style="width: 5rem;"> A Tutoring Company
            </a>
        </div>

    </div>
</footer>
</body>

</html>
<?php /**PATH C:\Users\Paulo Garrido\Desktop\proj3\resources\views/components/navfoot.blade.php ENDPATH**/ ?>