<x-header>
    <x-slot name="content">
        <!-- Title and Includes -->
        <title>Student List | A Tutoring Company</title>
    </x-slot>
</x-header>

<x-navfoot>
    <x-slot name="content">

        <div class="container">

            <h1 class="text-center m-4"> Search placeholder</h1>

            @foreach($users as $user)

                <div class="card m-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                                <h5> Name: {{ $user->name }}</h5>
                                <p> Email: {{ $user->email }}</p>
                                <p> Phone: {{ $user->phone }}</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <p> Created on: {{ $user->created_at }} </p>
                                <p> Last Updated: {{ $user->updated_at }} </p>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Options
                        </button>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <ul>
                                    <li> Change Disciplines </li>
                                    <li> Reset Password </li>
                                    <li> Disable account </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </x-slot>
</x-navfoot>

