<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <link rel="stylesheet" href="css/map.css">
        <title>Contact Us | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <!-- Contact info -->
        <div class="container mt-4">
            <div class="card-group">
                <div class="card">
                    <h4 class="card-title mx-auto"><i class="bi bi-envelope"></i> Email </h4>
                    <a class="card-body mx-auto  link-black" href="mailto:general@tutoringco.com"
                    > general@tutoringco.com </a>
                </div>
                <div class="card">
                    <h4 class="card-title mx-auto"><i class="bi bi-geo-alt"></i> Address </h4>
                    <div class="card-body mx-auto text-center"> R. Gen. Humberto Delgado 101, 4900-317 Viana do Castelo
                    </div>
                </div>
                <div class="card">
                    <h4 class="card-title mx-auto"><i class="bi bi-telephone"></i> Mobile Phone </h4>
                    <a class="card-body mx-auto link-black" href="tel:+912345678">
                        912345678 </a>
                </div>
            </div>
        </div>

        <!-- Location Map -->
        <div class="container map-responsive mt-3 mb-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2979.19498797044!2d-8.83524428429043!3d41.694726184848186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25b62a2ddb8c75%3A0x358dfba749064442!2sEsta%C3%A7%C3%A3o%20Viana%20Shopping!5e0!3m2!1spt-PT!2spt!4v1634823150023!5m2!1spt-PT!2spt"
                width="100%" height="100%" posicion="absolute" style="border:0;" allowfullscreen=""
                loading="lazy"></iframe>
        </div>
    </x-slot>
</x-navfoot>
