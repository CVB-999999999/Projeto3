<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>About Us | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

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
                        <h3 class="shadow-lg">Caption 1</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/images/review2.jpg" class="d-block w-10 mx-auto" alt="review1" style="width: 100%;">
                    <!-- Caption -->
                    <div class="carousel-caption">
                        <h3 class="shadow-lg">Caption 2</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/images/review3.jpg" class="d-block w-10 mx-auto" alt="review1" style="width: 100%;">
                    <!-- Caption -->
                    <div class="carousel-caption">
                        <h3 class="shadow-lg">Caption 3</h3>
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
                            <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths
                                for
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
                            <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths
                                for
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
                            <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths
                                for
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
                            <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths
                                for
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
                            <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths
                                for
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
                            <p class="card-text">Professor of mathematics with great experience in tutoring.PhD in Maths
                                for
                                Oxford in the year 1981.</p>
                            <a href="#" class="btn btn-primary">See profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>
</x-navfoot>
