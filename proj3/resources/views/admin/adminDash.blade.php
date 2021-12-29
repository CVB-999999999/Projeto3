<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Admin Dashboard | A Tutoring Company</title>
        <link rel="stylesheet" href="css/p3.css">
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">
        <div class="container text-center mb-3">
            <div class="m-5">
                <h1> Welcome Again Admin</h1>
                <h5> Time: <span id="time"></span> </h5>
            </div>

            <div class="row">
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Create new Users</h5>
                            <a class="stretched-link" href="/admin/register"></a>
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

            <div class="row">
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Edit/Create Disciplines</h5>
                            <a class="stretched-link" href="/admin/disciplines"></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Edit existing Tutors</h5>
                            <a class="stretched-link" href="/admin/tutors"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script>
            const d = new Date();
            document.getElementById("time").innerHTML = d.toUTCString();
        </script>

    </x-slot>
</x-navfoot>
