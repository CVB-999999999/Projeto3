<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title> Tutor Dashboard | A Tutoring Company</title>
        <link rel="stylesheet" href="css/p3.css">
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <h2 class="text-center m-4"> Select an Enrollment </h2>

        <div class="container">
            <!-- Search Field -->
            <div class="m-4">
                <form method="GET" action="#">
                    <div class="input-group m-3 mx-auto" style="max-width: 80vw">
                        <input type="text" name="search" class="form-control"
                               placeholder="Input a name or discipline to start searching">
                        <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>

            <div class="row">
                @foreach($users as $key=>$user)
                    <div class="col-md-6">
                        <div class="card m-1 p-0">
                            <div class="card-body">
                                <p><h4> Student Name: {{ $user->name }}</h4></p>
                                <p> Discipline: {{ $catgNames[$key]->name }} </p>
                                <a href="#" class="btn btn-dark stretched-link">View</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="m-5">
                {{$users->links()}}
            </div>
        </div>
    </x-slot>
</x-navfoot>

