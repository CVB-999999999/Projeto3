<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>About Us | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">
        <div class="container">

            <div class="row my-md-5 my-2">
                <div class="col-md-8">
                    <div class="card h-100 p-md-5 p-2 m-1">
                        <h1 class="mb-3"> Who are we?</h1>
                        <p>A Tutoring Company was created in 1999 to attend the demand of providing highly quality
                            services at a competetive price in the tutoring world.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta doloremque eaque excepturi
                            labore laboriosam laudantium magnam molestias, nihil omnis optio quibusdam quis repudiandae
                            sunt voluptates voluptatibus! Autem explicabo itaque repudiandae!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquid amet cum, debitis
                            deleniti distinctio eligendi in ipsa minima natus neque nobis officiis praesentium quaerat
                            repudiandae saepe voluptates. Aliquam, impedit?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad aliquam animi
                            commodi doloribus dolorum est fuga harum labore laboriosam nemo neque, omnis, quo quos rem
                            repellendus repudiandae sequi, vitae?</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-md-5 p-2 m-1">
                        <img class="m-1 p-1 border" src="./images/founder.jpg" alt="ATC Founder">
                        <h5 class="text-center"> Our Founder</h5>
                    </div>
                </div>
            </div>

            <!-- Carousel with happy customer reviews -->
            <div id="carousel" class="carousel slide container mx-1 mb-5" data-bs-ride="carousel">
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
        </div>

    </x-slot>
</x-navfoot>
