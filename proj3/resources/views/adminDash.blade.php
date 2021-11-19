<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Admin Dashboard | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <div class="container text-center">
            <div class="m-5">
                <h1> Welcome Again Admin</h1>
                <h5> Time: 31 Feb 1900, 00:00</h5>
                <h5> Last accessed: 30 Feb 1900, 00:00 </h5>
            </div>

            <!-- Students Stuff -->
            <div class="row">
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Create new Students</h5>
                            <a class="stretched-link" href="/register"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Edit existing Students</h5>
                            <a class="stretched-link" href="/admin/users"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutor Stuff -->
            <div class="row">
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Create new Tutors</h5>
                            <a class="stretched-link" href="/"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Edit existing Tutors</h5>
                            <a class="stretched-link" href="/"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-slot>
</x-navfoot>

