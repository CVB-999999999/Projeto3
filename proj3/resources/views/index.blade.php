<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Home | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

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
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"> First to third cycle </h2>
                    <ul class="card-body mx-auto">
                        <li> Tutoring to all subjects</li>
                        <li> Preperation to final exams</li>
                    </ul>
                </div>
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"> Secondary school </h2>
                    <ul class="card-body mx-auto">
                        <li> Tutoring to all subjects</li>
                        <li> Preperation to final exams</li>
                    </ul>
                </div>
                <div class="card wh-card border-white">
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
        {{--            <a class="btn btn-primary rounded-pill" href="/contactus" style="width: 15rem; height: 3rem;">--}}
        {{--                <h5>More information</h5>--}}
        {{--            </a>--}}
        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary py-2 px-4 rounded-pill" data-bs-toggle="modal"
                    data-bs-target="#moreInfo">
                <h5> Show all Disciplines </h5>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="moreInfo" tabindex="-1" aria-labelledby="moreInfoLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="moreInfoLabel">All Disciplines</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <ul>
                                @foreach($ctgs as $key=>$ctg)
                                    @if($key != 0)
                                        @if($ctg->grade != $ctgs[$key-1]->grade)
                                            <p><h6><strong> Grade {{ $ctg->grade }} </strong></h6></p>
                                        @endif
                                    @else
                                        <p><h6><strong> Grade {{ $ctg->grade }} </strong></h6></p>
                                    @endif
                                    <li> {{ $ctg->name }} </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why us -->
        <!-- Cards with markting -->
        <div class="container mx-auto mt-5 mb-5">
            <h1 class="text-center" style="margin-bottom: 2%;"> Why Us?</h1>
            <div class="row row-cols-md-3">
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"></i> High Success Rate </h2>
                    <div class="card-body mx-auto">
                        Our students are 30% more likelly to success in their education than our competition
                    </div>
                </div>
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"></i> Best Resources </h2>
                    <div class="card-body mx-auto">
                        All our resources are made by teachers curently teaching the subjects to ensure that they are
                        the best possible
                    </div>
                </div>
                <div class="card wh-card border-white">
                    <h2 class="card-title mx-auto text-center"> Ease of Use </h2>
                    <div class="card-body mx-auto">
                        As we have all our resouces online our students can study whenever they want
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-navfoot>

